@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Stock Movement Audit History</h4>
            <p class="text-muted mb-0">Complete historical audit trail of all inventory receipts, sales deductions, returns, and physical adjustments.</p>
        </div>
        <a href="{{ route('admin.inventory.index') }}" class="btn btn-outline-secondary">
            <i class="ti ti-arrow-left me-1"></i> Back to Inventory
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <!-- Filter Bar -->
            <form method="GET" action="{{ route('admin.inventory.movements') }}" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search reference number or notes..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="type" class="form-select">
                        <option value="">All Movement Types</option>
                        <option value="order_sale" {{ request('type') === 'order_sale' ? 'selected' : '' }}>Sale Deduction</option>
                        <option value="order_return" {{ request('type') === 'order_return' ? 'selected' : '' }}>Order Return / Restock</option>
                        <option value="purchase_receipt" {{ request('type') === 'purchase_receipt' ? 'selected' : '' }}>Purchase Receipt</option>
                        <option value="manual_adjustment" {{ request('type') === 'manual_adjustment' ? 'selected' : '' }}>Manual Adjustment</option>
                        <option value="damaged" {{ request('type') === 'damaged' ? 'selected' : '' }}>Damaged Goods</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="product_id" class="form-select">
                        <option value="">All Products</option>
                        @foreach($products as $prod)
                            <option value="{{ $prod->id }}" {{ request('product_id') == $prod->id ? 'selected' : '' }}>{{ $prod->name }} ({{ $prod->sku }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="ti ti-filter"></i> Filter</button>
                    @if(request()->hasAny(['search', 'type', 'product_id']))
                        <a href="{{ route('admin.inventory.movements') }}" class="btn btn-outline-secondary"><i class="ti ti-x"></i></a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Timestamp</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Stock Transition</th>
                            <th>Reference</th>
                            <th>Operator</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movements as $mv)
                            <tr>
                                <td class="text-nowrap small text-muted">
                                    {{ $mv->created_at->format('M d, Y') }}<br>
                                    <span class="fw-bold">{{ $mv->created_at->format('h:i A') }}</span>
                                </td>
                                <td>
                                    @if($mv->product)
                                        <div class="fw-bold text-dark">{{ $mv->product->name }}</div>
                                        <small class="text-muted font-monospace">{{ $mv->product->sku }}</small>
                                    @else
                                        <span class="text-muted">Product Removed</span>
                                    @endif
                                </td>
                                <td>
                                    @if($mv->type === 'order_sale')
                                        <span class="badge bg-light-danger text-danger border border-danger">Order Sale</span>
                                    @elseif($mv->type === 'order_return')
                                        <span class="badge bg-light-success text-success border border-success">Order Return</span>
                                    @elseif($mv->type === 'purchase_receipt')
                                        <span class="badge bg-light-primary text-primary border border-primary">Purchase Receipt</span>
                                    @elseif($mv->type === 'damaged')
                                        <span class="badge bg-danger">Damaged</span>
                                    @else
                                        <span class="badge bg-light-secondary text-secondary border border-secondary">Manual Adjust</span>
                                    @endif
                                </td>
                                <td class="text-center fw-bold fs-5 {{ $mv->quantity > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $mv->quantity > 0 ? '+' . $mv->quantity : $mv->quantity }}
                                </td>
                                <td class="text-center">
                                    <span class="text-muted">{{ $mv->previous_quantity }}</span>
                                    <i class="ti ti-arrow-right mx-1 small text-muted"></i>
                                    <span class="fw-bold text-dark">{{ $mv->new_quantity }}</span>
                                </td>
                                <td>
                                    <span class="font-monospace small fw-bold">{{ $mv->reference_number ?: 'N/A' }}</span>
                                </td>
                                <td>
                                    <small>{{ $mv->user ? $mv->user->name : 'System' }}</small>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $mv->notes ?: '—' }}</small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No stock movements recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $movements->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
