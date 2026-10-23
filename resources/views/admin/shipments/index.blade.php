@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Shipments & Logistics Management</h4>
            <p class="text-muted mb-0">Monitor active consignments, manual deliveries, and external courier shipments.</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
            <i class="ti ti-shopping-cart me-1"></i> View Orders to Dispatch
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <!-- Filter Bar -->
            <form method="GET" action="{{ route('admin.shipments.index') }}" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search Shipment #, AWB, or Order #..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Shipment States</option>
                        <option value="packed" {{ request('status') === 'packed' ? 'selected' : '' }}>Packed & Ready</option>
                        <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Shipped / Dispatched</option>
                        <option value="in_transit" {{ request('status') === 'in_transit' ? 'selected' : '' }}>In Transit</option>
                        <option value="out_for_delivery" {{ request('status') === 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                        <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="delivery_failed" {{ request('status') === 'delivery_failed' ? 'selected' : '' }}>Delivery Failed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="delivery_type" class="form-select">
                        <option value="">All Delivery Types</option>
                        <option value="manual" {{ request('delivery_type') === 'manual' ? 'selected' : '' }}>In-House Staff</option>
                        <option value="courier" {{ request('delivery_type') === 'courier' ? 'selected' : '' }}>External Courier</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="ti ti-filter"></i> Filter</button>
                    @if(request()->hasAny(['search', 'status', 'delivery_type']))
                        <a href="{{ route('admin.shipments.index') }}" class="btn btn-outline-secondary"><i class="ti ti-x"></i></a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Shipment #</th>
                            <th>Order Ref</th>
                            <th>Customer & Destination</th>
                            <th>Carrier / Driver</th>
                            <th>AWB / Tracking</th>
                            <th>Status</th>
                            <th>Dispatched At</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipments as $shp)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.shipments.show', $shp->id) }}" class="fw-bold text-primary font-monospace">
                                        {{ $shp->shipment_number }}
                                    </a>
                                </td>
                                <td>
                                    @if($shp->order)
                                        <a href="{{ route('admin.orders.show', $shp->order->id) }}" class="fw-bold text-dark font-monospace">
                                            #{{ $shp->order->order_number ?: $shp->order->id }}
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $shp->order ? $shp->order->customer_name : 'N/A' }}</div>
                                    <small class="text-muted">{{ $shp->order ? $shp->order->city . ', ' . $shp->order->state : '' }}</small>
                                </td>
                                <td>
                                    @if($shp->delivery_type === 'manual')
                                        <span class="badge bg-light text-dark border"><i class="ti ti-moped me-1"></i> In-House: {{ $shp->deliveryPersonnel && $shp->deliveryPersonnel->user ? $shp->deliveryPersonnel->user->name : 'Staff Assigned' }}</span>
                                    @else
                                        <span class="badge bg-light-primary text-primary border"><i class="ti ti-truck me-1"></i> {{ $shp->courier_name ?: 'Courier' }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($shp->awb_number)
                                        <span class="font-monospace fw-bold">{{ $shp->awb_number }}</span>
                                        @if($shp->tracking_url)
                                            <a href="{{ $shp->tracking_url }}" target="_blank" class="small text-primary d-block">
                                                <i class="ti ti-external-link"></i> Live Track
                                            </a>
                                        @endif
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if($shp->status === 'delivered')
                                        <span class="badge bg-success">Delivered</span>
                                    @elseif($shp->status === 'out_for_delivery')
                                        <span class="badge bg-info text-dark">Out for Delivery</span>
                                    @elseif($shp->status === 'in_transit')
                                        <span class="badge bg-warning text-dark">In Transit</span>
                                    @elseif($shp->status === 'shipped')
                                        <span class="badge bg-primary">Shipped</span>
                                    @elseif($shp->status === 'delivery_failed')
                                        <span class="badge bg-danger">Delivery Failed</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($shp->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $shp->shipped_at ? $shp->shipped_at->format('M d, Y h:i A') : 'Pending Dispatch' }}</small>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.shipments.show', $shp->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye me-1"></i> Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No shipments found. Dispatch orders to generate shipments.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $shipments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
