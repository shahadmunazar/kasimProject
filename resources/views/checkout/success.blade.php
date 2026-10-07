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
                        <h5 class="fw-bold border-bottom pb-2 mb-3">Order Details</h5>
                        <p class="mb-1"><strong>Product:</strong> {{ $order->product->name ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Quantity:</strong> {{ $order->quantity }}</p>
                        <p class="mb-1"><strong>Total Amount:</strong> ₹{{ $order->amount }}</p>
                        <p class="mb-1"><strong>Transaction ID:</strong> {{ $order->transaction_id }}</p>
                    </div>

                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-5 rounded-pill">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
