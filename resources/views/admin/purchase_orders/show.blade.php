@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                Purchase Order <span class="text-primary font-monospace">{{ $purchaseOrder->po_number }}</span>
            </h4>
            <p class="text-muted mb-0">Record physical goods receiving into destination warehouse.</p>
        </div>
        <a href="{{ route('admin.purchase_orders.index') }}" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left me-1"></i> Back to Purchase Orders
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- PO Header Info -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title fw-bold mb-0">Supplier & Destination</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted text-uppercase fw-bold">Supplier</small>
                        <h5 class="fw-bold text-dark mb-0">{{ $purchaseOrder->supplier->name }}</h5>
                        @if($purchaseOrder->supplier->company_name)
                            <div class="small text-muted">{{ $purchaseOrder->supplier->company_name }}</div>
                        @endif
                        <div class="small mt-1"><i class="ti ti-phone me-1"></i>{{ $purchaseOrder->supplier->phone ?: 'N/A' }}</div>
                        <div class="small"><i class="ti ti-mail me-1"></i>{{ $purchaseOrder->supplier->email ?: 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase fw-bold">Destination Warehouse</small>
                        <h6 class="fw-bold text-dark mb-0">{{ $purchaseOrder->warehouse->name }}</h6>
                        <small class="text-muted font-monospace">{{ $purchaseOrder->warehouse->code }}</small>
                        <div class="small mt-1">{{ $purchaseOrder->warehouse->city }}, {{ $purchaseOrder->warehouse->state }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted text-uppercase fw-bold">Order Date</small>
                            <div class="fw-bold">{{ $purchaseOrder->order_date ? \Carbon\Carbon::parse($purchaseOrder->order_date)->format('M d, Y') : '—' }}</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted text-uppercase fw-bold">Status</small>
                            <div>
                                @if($purchaseOrder->status === 'received')
                                    <span class="badge bg-success">Fully Received</span>
                                @elseif($purchaseOrder->status === 'partial')
                                    <span class="badge bg-warning text-dark">Partially Received</span>
                                @else
                                    <span class="badge bg-info text-dark">{{ ucfirst($purchaseOrder->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($purchaseOrder->notes)
                        <hr>
                        <small class="text-muted text-uppercase fw-bold">Notes</small>
                        <p class="small text-muted mb-0">{{ $purchaseOrder->notes }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- PO Items & Goods Receipt Form -->
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold mb-0">Purchase Order Items</h5>
                    <span class="badge bg-light text-dark border">Total Value: ₹{{ number_format($purchaseOrder->total_amount, 2) }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.purchase_orders.receive', $purchaseOrder->id) }}" method="POST">
                        @csrf
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Ordered</th>
                                        <th class="text-center">Received So Far</th>
                                        <th class="text-center">Remaining</th>
                                        <th class="text-end">Unit Cost</th>
                                        <th style="width: 25%;" class="text-center bg-light-primary">Receive Now</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchaseOrder->items as $item)
                                        @php
                                            $remaining = max(0, $item->quantity_ordered - $item->quantity_received);
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $item->product ? $item->product->name : 'N/A' }}</div>
                                                <small class="text-muted font-monospace">{{ $item->product ? $item->product->sku : '' }}</small>
                                            </td>
                                            <td class="text-center fw-bold">{{ $item->quantity_ordered }}</td>
                                            <td class="text-center text-success fw-bold">{{ $item->quantity_received }}</td>
                                            <td class="text-center text-danger fw-bold">{{ $remaining }}</td>
                                            <td class="text-end">₹{{ number_format($item->unit_cost, 2) }}</td>
                                            <td class="bg-light-primary text-center">
                                                @if($remaining > 0)
                                                    <input type="number" 
                                                           name="received[{{ $item->id }}]" 
                                                           min="0" 
                                                           max="{{ $remaining }}" 
                                                           value="{{ $remaining }}" 
                                                           class="form-control form-control-sm text-center fw-bold">
                                                @else
                                                    <span class="badge bg-success"><i class="ti ti-check"></i> Complete</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($purchaseOrder->status !== 'received')
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4" onclick="return confirm('Confirm physical receipt of these items into {{ $purchaseOrder->warehouse->name }}? Stock on hand will be updated immediately.');">
                                    <i class="ti ti-package me-1"></i> Receive Goods into Warehouse
                                </button>
                            </div>
                        @else
                            <div class="alert alert-success text-center py-2 mb-0">
                                <i class="ti ti-circle-check me-1"></i> All goods under this purchase order have been received and verified.
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
