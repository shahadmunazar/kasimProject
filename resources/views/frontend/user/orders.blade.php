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
                <a href="{{ url('/') }}" class="btn btn-primary mt-2">Browse Products</a>
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
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('frontend.dashboard.order.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
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
