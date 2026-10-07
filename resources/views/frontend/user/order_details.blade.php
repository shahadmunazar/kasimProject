@extends('frontend.user.layout')

@section('dashboard_content')
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <h4 class="mb-0">
                <a href="{{ route('frontend.dashboard.orders') }}" class="text-decoration-none text-muted me-2"><i class="fa fa-arrow-left"></i></a>
                Order Details <span class="text-primary">#{{ $order->order_number }}</span>
            </h4>
            <span class="badge bg-{{ $order->status == 'pending' ? 'warning text-dark' : ($order->status == 'completed' ? 'success' : 'secondary') }} fs-6 px-3 py-2">
                {{ ucfirst($order->status) }}
            </span>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card border h-100 bg-light">
                    <div class="card-body">
                        <h6 class="fw-bold text-uppercase text-muted mb-3"><i class="fa fa-map-marker-alt me-2"></i>Shipping & Delivery</h6>
                        <p class="mb-1 fw-bold">{{ $order->customer_name }}</p>
                        <p class="mb-1">{{ $order->address }}</p>
                        <p class="mb-1">{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                        <p class="mb-0"><i class="fa fa-phone small me-1"></i> {{ $order->mobile }}</p>
                        @if($order->email)
                            <p class="mb-2"><i class="fa fa-envelope small me-1"></i> {{ $order->email }}</p>
                        @endif
                        
                        @if($order->expected_delivery_date)
                            <hr class="my-2">
                            <p class="mb-0 text-success fw-bold"><i class="fa fa-truck me-2"></i>Expected Delivery: {{ \Carbon\Carbon::parse($order->expected_delivery_date)->format('M d, Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card border h-100 bg-light">
                    <div class="card-body">
                        <h6 class="fw-bold text-uppercase text-muted mb-3"><i class="fa fa-credit-card me-2"></i>Payment Details</h6>
                        <p class="mb-1"><strong>Method:</strong> {{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Online / QR Code' }}</p>
                        <p class="mb-1"><strong>Status:</strong> {!! $order->is_confirmed ? '<span class="text-success fw-bold">Confirmed</span>' : '<span class="text-warning fw-bold">Pending</span>' !!}</p>
                        <p class="mb-1"><strong>Total Amount:</strong> ₹{{ number_format($order->amount, 2) }}</p>
                        
                        @if($order->payment_method === 'QR')
                            <hr>
                            @if($order->transaction_id)
                                <p class="mb-1 small text-muted"><strong>Txn ID:</strong> {{ $order->transaction_id }}</p>
                            @endif
                            @if($order->utr_number)
                                <p class="mb-1 small text-muted"><strong>UTR:</strong> {{ $order->utr_number }}</p>
                            @endif
                            @if($order->payment_date)
                                <p class="mb-1 small text-muted"><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->payment_date)->format('M d, Y') }}</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <h5 class="fw-bold mb-3 border-bottom pb-2">Items in this Order</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Product Details</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $item)
                        @php
                            $prod = \App\Models\Product::find($item->product_id);
                            $imageUrl = null;
                            if ($prod) {
                                if (!empty($prod->image)) {
                                    $imageUrl = asset('storage/' . $prod->image);
                                } elseif (is_array($prod->images) && count($prod->images) > 0) {
                                    $imageUrl = asset('storage/' . $prod->images[0]);
                                } else {
                                    $imageUrl = asset('assets/images/no-image.png');
                                }
                            }
                        @endphp
                    <tr>
                        <td>
                            @if($prod)
                                <a href="{{ route('product.details', $prod->slug) }}" class="text-decoration-none text-dark d-flex align-items-center">
                                    <img src="{{ $imageUrl }}" class="rounded me-3 border" style="width: 50px; height: 50px; object-fit:cover;">
                                    <span class="fw-bold hover-primary">{{ $prod->name }}</span>
                                </a>
                            @else
                                <span class="text-muted">Product Removed</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">₹{{ number_format($item->price, 2) }}</td>
                        <td class="text-center align-middle">{{ $item->quantity }}</td>
                        <td class="text-end align-middle fw-bold">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end">Subtotal</td>
                        <td class="text-end fw-bold">₹{{ number_format($order->amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end text-success">Shipping</td>
                        <td class="text-end text-success fw-bold">Free</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end fw-bold fs-5">Grand Total</td>
                        <td class="text-end fw-bold fs-5 text-primary">₹{{ number_format($order->amount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection
