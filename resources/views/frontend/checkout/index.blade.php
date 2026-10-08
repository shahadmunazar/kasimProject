@extends('frontend.layouts.main')

@section('content')
<div class="container py-5 my-5">
    <div class="row">
        <!-- Checkout Form -->
        <div class="col-lg-8 mb-4">
            <h2 class="fw-bold mb-4">Checkout</h2>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('frontend.checkout.process', $product->id) }}" method="POST" id="checkoutForm" enctype="multipart/form-data">
                @csrf
                
                <!-- 1. Delivery Address -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="mb-0 fw-bold"><i class="fa fa-map-marker-alt text-primary me-2"></i>1. Delivery Address</h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        @if($addresses->count() > 0)
                            <div class="row mb-3">
                                @foreach($addresses as $address)
                                <div class="col-md-6 mb-3">
                                    <div class="card border address-card h-100 {{ $address->is_default ? 'border-primary' : '' }}" onclick="selectAddress('{{ $address->id }}')">
                                        <div class="card-body position-relative">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="address_id" id="addr_{{ $address->id }}" value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold" for="addr_{{ $address->id }}">
                                                    {{ $address->name }}
                                                </label>
                                            </div>
                                            <p class="mb-1 text-muted small mt-2">{{ $address->phone }}</p>
                                            <p class="mb-0 small">
                                                {{ $address->address_line_1 }}, {{ $address->address_line_2 }}<br>
                                                {{ $address->city }}, {{ $address->state }} - {{ $address->zip }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-6 mb-3">
                                    <div class="card border border-dashed h-100 text-center" style="cursor: pointer; border-style: dashed !important;" onclick="selectAddress('new')">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="address_id" id="addr_new" value="new">
                                                <label class="form-check-label fw-bold" for="addr_new">
                                                    Add New Address
                                                </label>
                                            </div>
                                            <i class="fa fa-plus-circle fa-2x text-muted mt-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="address_id" value="new">
                        @endif

                        <!-- New Address Form (Hidden if addresses exist and not selected) -->
                        <div id="newAddressForm" class="{{ $addresses->count() > 0 ? 'd-none' : '' }} mt-3 pt-3 border-top">
                            <h6 class="fw-bold mb-3">Enter New Address</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small">Alt Number (Optional)</label>
                                    <input type="text" name="alternative_number" class="form-control" value="{{ old('alternative_number') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small">Address Line 1</label>
                                    <input type="text" name="address_line_1" class="form-control" value="{{ old('address_line_1') }}" placeholder="Street address">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small">Address Line 2 (Optional)</label>
                                    <input type="text" name="address_line_2" class="form-control" value="{{ old('address_line_2') }}">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label small">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small">ZIP Code</label>
                                    <input type="text" name="zip" class="form-control" value="{{ old('zip') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Payment Method -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="mb-0 fw-bold"><i class="fa fa-credit-card text-primary me-2"></i>2. Payment Method</h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        
                        <!-- COD Option (Commented out as requested) 
                        <div class="form-check border p-3 rounded bg-light mb-3 payment-option" onclick="selectPayment('cod')">
                            <input class="form-check-input" type="radio" name="payment_method" id="paymentCod" value="cod">
                            <label class="form-check-label fw-bold d-block w-100" for="paymentCod">
                                <i class="fa fa-money-bill-wave text-success me-1"></i> Cash on Delivery (COD)
                                <span class="d-block text-muted small fw-normal mt-1">Pay when your order is delivered to your doorstep.</span>
                            </label>
                        </div>
                        -->

                        <!-- Online Payment Option -->
                        <div class="form-check border p-3 rounded payment-option bg-light border-primary" onclick="selectPayment('QR')">
                            <input class="form-check-input" type="radio" name="payment_method" id="paymentOnline" value="QR" checked>
                            <label class="form-check-label fw-bold d-block w-100" for="paymentOnline">
                                <i class="fa fa-qrcode text-primary me-1"></i> Pay via UPI / QR Code
                                <span class="d-block text-muted small fw-normal mt-1">Scan our QR code and upload your payment details.</span>
                            </label>
                            
                            <!-- Payment Details Form (Hidden by default) -->
                            <div id="paymentDetailsForm" class="d-none mt-4 pt-3 border-top">
                                <!-- QR Code display -->
                                <div class="text-center mb-4">
                                    @if($qrCodePath)
                                        <img src="{{ asset('storage/' . $qrCodePath) }}" alt="Scan to Pay" class="img-thumbnail" style="max-width: 250px;">
                                    @else
                                        <div class="alert alert-warning">Admin hasn't uploaded a QR Code yet.</div>
                                    @endif
                                    <p class="small text-muted mt-2">Scan to pay ₹{{ number_format(($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price, 2) }}</p>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small">Transaction ID <span class="text-danger">*</span></label>
                                        <input type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="e.g. TXN123456789">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">UTR Number</label>
                                        <input type="text" name="utr_number" class="form-control" placeholder="Optional">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">Payment Date <span class="text-danger">*</span></label>
                                        <input type="date" name="payment_date" id="payment_date" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">Amount Paid <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" name="payment_amount" id="payment_amount" class="form-control" value="{{ ($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price }}" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small">Payment Screenshot (Optional)</label>
                                        <input type="file" name="payment_screenshot" class="form-control" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold text-uppercase py-3 shadow" id="btnPlaceOrder">Place Order Now</button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Order Summary</h5>
                </div>
                <div class="card-body p-0">
                    <div class="d-flex p-3 border-bottom align-items-center">
                        @php
                            $checkoutImage = ($product->images && count($product->images) > 0) ? $product->images[0] : 'default.png';
                        @endphp
                        <img src="{{ asset('storage/' . $checkoutImage) }}" alt="{{ $product->name }}" class="rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
                            <p class="text-muted small mb-0">Qty: 1</p>
                        </div>
                    </div>
                    
                    <div class="p-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-bold">₹{{ number_format(($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                            <span class="text-muted">Delivery</span>
                            <span class="text-success fw-bold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">Total</h5>
                            <h5 class="fw-bold text-primary">₹{{ number_format(($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price, 2) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function selectAddress(id) {
        document.getElementById('addr_' + id).checked = true;
        
        // Handle border highlights
        document.querySelectorAll('.address-card').forEach(card => card.classList.remove('border-primary'));
        if(id !== 'new') {
            document.getElementById('addr_' + id).closest('.card').classList.add('border-primary');
        }

        // Toggle New Address Form
        const newForm = document.getElementById('newAddressForm');
        const inputs = newForm.querySelectorAll('input:not([type="hidden"])');
        
        if (id === 'new') {
            newForm.classList.remove('d-none');
            inputs.forEach(input => input.setAttribute('required', 'required'));
        } else {
            newForm.classList.add('d-none');
            inputs.forEach(input => input.removeAttribute('required'));
        }
    }

    // Initialize required attributes on load
    document.addEventListener("DOMContentLoaded", function() {
        const checkedAddr = document.querySelector('input[name="address_id"]:checked');
        if (checkedAddr) {
            selectAddress(checkedAddr.value);
        }
        selectPayment('QR'); // Default to QR since COD is disabled
        
        // Form submission handling to prevent double clicks but allow HTML5 validation
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('btnPlaceOrder');
            if(!this.checkValidity()) {
                return; // Let browser show errors
            }
            btn.disabled = true;
            btn.innerHTML = 'Processing Order...';
        });
    });

    function selectPayment(method) {
        document.getElementById(method === 'cod' ? 'paymentCod' : 'paymentOnline').checked = true;
        
        const onlineForm = document.getElementById('paymentDetailsForm');
        const reqFields = ['transaction_id', 'payment_date'];
        
        document.querySelectorAll('.payment-option').forEach(el => {
            el.classList.remove('bg-light');
            el.classList.remove('border-primary');
        });
        document.getElementById(method === 'cod' ? 'paymentCod' : 'paymentOnline').closest('.payment-option').classList.add('bg-light', 'border-primary');

        if (method === 'QR') {
            onlineForm.classList.remove('d-none');
            reqFields.forEach(f => document.getElementById(f).setAttribute('required', 'required'));
        } else {
            onlineForm.classList.add('d-none');
            reqFields.forEach(f => document.getElementById(f).removeAttribute('required'));
        }
    }
</script>
@endpush
@endsection
