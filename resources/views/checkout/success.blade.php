@extends('frontend.layouts.main')

@section('meta_title', 'Order Success')

@section('content')
<section class="section pt-5 mt-5">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card shadow-sm border-0 rounded-4 p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
                    </div>
                    <h2 class="fw-bold mb-3">Order Placed Successfully!</h2>
                    <p class="lead text-muted mb-4">Thank you for your purchase. We have received your payment details and screenshot. Our team will verify the payment and process your order shortly.</p>
                    
                    <div class="bg-light p-4 rounded text-start mb-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                            <h5 class="fw-bold mb-0">Order Summary</h5>
                            <span class="badge bg-primary fs-6">#{{ $order->order_number ?? str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-muted small text-uppercase">Purchased Items:</h6>
                            @if($order->items && $order->items->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless align-middle mb-0">
                                        <tbody>
                                            @foreach($order->items as $item)
                                                @php $p = $item->product; @endphp
                                                <tr>
                                                    <td class="ps-0">
                                                        <span class="fw-semibold text-dark">{{ $p->name ?? 'Product' }}</span>
                                                    </td>
                                                    <td class="text-center text-muted">
                                                        &times; {{ $item->quantity }}
                                                    </td>
                                                    <td class="text-end pe-0 fw-bold">
                                                        ₹{{ number_format($item->price * $item->quantity, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @elseif($order->product)
                                <p class="mb-1"><strong>Product:</strong> {{ $order->product->name }}</p>
                                <p class="mb-1"><strong>Quantity:</strong> {{ $order->quantity }}</p>
                            @endif
                        </div>

                        <hr class="my-2">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Delivery Charges:</span>
                            <span class="fw-bold">{{ $order->delivery_charge > 0 ? '₹' . number_format($order->delivery_charge, 2) : 'Free' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Total Paid:</span>
                            <span class="fw-bold fs-5 text-primary">₹{{ number_format($order->amount, 2) }}</span>
                        </div>

                        <div class="small text-muted border-top pt-2">
                            <p class="mb-1"><strong>Transaction ID:</strong> <span class="font-monospace text-dark">{{ $order->transaction_id }}</span></p>
                            @if($order->utr_number)
                                <p class="mb-1"><strong>UTR Number:</strong> <span class="font-monospace text-dark">{{ $order->utr_number }}</span></p>
                            @endif
                            <p class="mb-0"><strong>Shipping to:</strong> {{ $order->customer_name }}, {{ $order->address }}, {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('products.listing') }}" class="btn btn-outline-primary btn-lg px-4 rounded-pill">Continue Shopping</a>
                        @auth
                            <a href="{{ route('frontend.dashboard.orders') }}" class="btn btn-primary btn-lg px-4 rounded-pill">View My Orders</a>
                        @else
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 rounded-pill">Return to Home</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
