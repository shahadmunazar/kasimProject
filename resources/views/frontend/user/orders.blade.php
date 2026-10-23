@extends('frontend.user.layout')

@section('dashboard_content')
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">My Orders</h4>
        </div>
        
        @if($orders->isEmpty())
            <div class="alert alert-info border-0 text-center py-4">
                <i class="fa fa-shopping-bag fa-3x mb-3 text-muted"></i>
                <h5>No orders yet</h5>
                <p>Looks like you haven't placed any orders yet. Start shopping!</p>
                <a href="{{ route('products.listing') }}" class="btn btn-primary mt-2">Browse Products</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><span class="fw-bold">{{ $order->order_number }}</span></td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>₹{{ number_format($order->amount, 2) }}</td>
                            <td>
                                @if($order->hasShipmentTracking())
                                    <span class="badge bg-{{ $order->delivery_status_badge }} small">
                                        {{ $order->delivery_status_label }}
                                    </span>
                                    <div class="small text-muted font-monospace mt-1">
                                        <i class="fa fa-truck me-1"></i>{{ $order->effective_courier_name }}: {{ $order->effective_tracking_id }}
                                    </div>
                                @elseif($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'completed' || $order->status == 'delivered')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <a href="{{ route('frontend.dashboard.order.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                                    @if($order->isDelivered())
                                        <a href="{{ route('frontend.dashboard.order.invoice.pdf', $order->id) }}" class="btn btn-sm btn-success" title="Download Tax Invoice PDF">
                                            <i class="fa fa-file-pdf"></i> Invoice
                                        </a>
                                    @endif
                                    @if($order->effective_tracking_url)
                                        <a href="{{ $order->effective_tracking_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" title="Track on {{ $order->effective_courier_name }}">
                                            <i class="fa fa-external-link-alt"></i> Track
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
