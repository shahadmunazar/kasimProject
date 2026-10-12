@extends('frontend.layouts.main')

@section('meta_title', 'Checkout')

@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Checkout</span>
          <h1 class="text-capitalize mb-5 text-lg">Complete Your Order</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="mb-4 fw-bold">Billing & Order Details</h4>
                        <form action="{{ $isDirectBuy ? route('checkout.store', $directProduct->id) : route('checkout.store') }}" method="POST" enctype="multipart/form-data" id="checkoutForm">
                            @csrf
                            
                            <h5 class="mt-4 mb-3">1. Personal Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', Auth::user()->name ?? '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', Auth::user()->phone ?? '') }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email Address (Optional)</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email ?? '') }}">
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">2. Shipping Address</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control" rows="2" required placeholder="House/Flat No., Street, Landmark">{{ old('address') }}</textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State <span class="text-danger">*</span></label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                    <input type="text" name="pincode" class="form-control" value="{{ old('pincode') }}" required>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">3. Payment Verification</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Transaction ID <span class="text-danger">*</span></label>
                                    <input type="text" name="transaction_id" class="form-control" value="{{ old('transaction_id') }}" required placeholder="e.g. T20120239...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">UTR Number <span class="text-danger">*</span></label>
                                    <input type="text" name="utr_number" class="form-control" value="{{ old('utr_number') }}" required placeholder="e.g. 123456789012">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Payment Amount Paid (₹) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="payment_amount" id="payment_amount" class="form-control" value="{{ old('payment_amount', number_format($subtotal + $deliveryCharge, 2, '.', '')) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                                    <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', date('Y-m-d')) }}" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Upload Payment Screenshot <span class="text-danger">*</span></label>
                                    <input type="file" name="payment_screenshot" class="form-control" accept="image/*" required>
                                    <small class="text-muted">Upload a clear screenshot of your successful transaction.</small>
                                </div>
                            </div>

                            <div class="form-check mb-4 p-3 bg-light rounded border">
                                <input class="form-check-input ms-2 mt-2" type="checkbox" name="confirmation" id="confirmationCheck" value="1" required style="transform: scale(1.3);">
                                <label class="form-check-label ms-4 mt-1 fw-bold text-dark" for="confirmationCheck">
                                    ☑ I confirm that the payment has been successfully transferred and the details provided are correct.
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold" id="btnPlaceOrder">Place Order Now</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Order Summary -->
                <div class="card shadow-sm border-0 mb-4 sticky-top" style="top: 100px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title fw-bold mb-0">Order Summary</h4>
                            <span class="badge bg-light text-dark border">{{ $items->count() }} {{ Str::plural('Item', $items->count()) }}</span>
                        </div>
                        
                        <!-- List of Products in Checkout -->
                        <div class="order-items-scroll mb-3 pe-1" style="max-height: 280px; overflow-y: auto;">
                            @foreach($items as $iIndex => $it)
                                @php
                                    $p = $it->product;
                                    $pImg = ($p->images && count($p->images) > 0) ? $p->images[0] : null;
                                @endphp
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                    @if($pImg)
                                        <img src="{{ asset('storage/' . $pImg) }}" alt="{{ $p->name }}" class="img-thumbnail me-3 flex-shrink-0" style="width: 65px; height: 65px; object-fit: contain;">
                                    @else
                                        <div class="rounded border bg-light me-3 d-flex align-items-center justify-content-center text-muted flex-shrink-0" style="width: 65px; height: 65px;">
                                            <i class="fa fa-box fa-2x"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1 min-w-0">
                                        <h6 class="mb-1 text-truncate fw-bold" style="font-size: 0.92rem;" title="{{ $p->name }}">{{ $p->name }}</h6>
                                        <div class="d-flex justify-content-between align-items-center small text-muted">
                                            <span>₹{{ number_format($it->price, 2) }} &times; {{ $it->quantity }}</span>
                                            <span class="fw-bold text-dark">₹{{ number_format($it->subtotal, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Direct buy single item quantity adjuster -->
                        @if($isDirectBuy)
                        <div class="d-flex justify-content-between align-items-center mb-3 bg-light p-2 rounded">
                            <span class="small fw-semibold text-muted">Adjust Quantity:</span>
                            <div class="input-group input-group-sm" style="width: 110px;">
                                <button class="btn btn-outline-secondary" type="button" id="btnMinus">-</button>
                                <input type="number" class="form-control text-center" id="qtyInput" value="{{ $totalQuantity }}" min="1" readonly>
                                <button class="btn btn-outline-secondary" type="button" id="btnPlus">+</button>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal ({{ $totalQuantity }} items)</span>
                            <span class="fw-bold text-dark">₹<span id="subtotalDisplay">{{ number_format($subtotal, 2) }}</span></span>
                        </div>

                        <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                            <span class="text-muted">Delivery Charges</span>
                            <span class="fw-bold delivery-charge-display text-muted">
                                @if($deliveryCharge > 0)
                                    ₹{{ number_format($deliveryCharge, 2) }}
                                @else
                                    <span id="deliveryChargeText">Calculated on address</span>
                                @endif
                            </span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Total Amount</h5>
                            <h4 class="fw-bold text-primary mb-0">₹<span id="totalAmount">{{ number_format($subtotal + $deliveryCharge, 2) }}</span></h4>
                        </div>
                    </div>
                </div>

                <!-- QR Code Section -->
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Scan QR to Pay</h5>
                        <p class="text-muted small mb-3">Please scan the UPI QR code below and transfer the exact Total Amount using GPay, PhonePe, or Paytm.</p>
                        @if($qrCode && $qrCode->value)
                            <div class="bg-white p-3 rounded d-inline-block shadow-sm" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#qrModal">
                                <img src="{{ asset('storage/' . $qrCode->value) }}" alt="Payment QR Code" class="img-fluid" style="max-width: 200px;">
                                <div class="mt-2 text-primary small"><i class="fa fa-search-plus"></i> Click to enlarge</div>
                            </div>

                            <!-- QR Code Modal -->
                            <div class="modal fade" id="qrModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0 pb-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center pt-0 pb-4">
                                            <h4 class="fw-bold mb-3">Scan to Pay</h4>
                                            <img src="{{ asset('storage/' . $qrCode->value) }}" alt="Payment QR Code" class="img-fluid" style="max-width: 320px;">
                                            <p class="mt-3 mb-0 fw-bold fs-4 text-primary">Total: ₹<span class="modalTotalAmount">{{ number_format($subtotal + $deliveryCharge, 2) }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-white p-4 rounded d-inline-block shadow-sm text-muted border">
                                <i class="fa fa-qrcode fa-3x mb-2 text-muted"></i>
                                <p class="mb-0 small">Scan UPI on Delivery or Contact Admin</p>
                            </div>
                        @endif
                        <p class="mt-4 mb-0 fw-bold text-dark fs-5">Total to Pay: ₹<span id="qrTotalAmount">{{ number_format($subtotal + $deliveryCharge, 2) }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isDirectBuy = {{ $isDirectBuy ? 'true' : 'false' }};
        let currentSubtotal = {{ (float)$subtotal }};
        let deliveryCharge = {{ (float)$deliveryCharge }};
        const singleUnitPrice = {{ $isDirectBuy && $directProduct ? (($directProduct->offer_price && $directProduct->offer_price > 0) ? $directProduct->offer_price : $directProduct->price) : 0 }};
        
        const qtyInput = document.getElementById('qtyInput');
        const checkoutForm = document.getElementById('checkoutForm');
        
        let formQtyInput = null;
        if (isDirectBuy && qtyInput) {
            formQtyInput = document.createElement('input');
            formQtyInput.type = 'hidden';
            formQtyInput.name = 'quantity';
            formQtyInput.value = qtyInput.value;
            checkoutForm.appendChild(formQtyInput);
        }

        const subtotalDisplay = document.getElementById('subtotalDisplay');
        const totalAmountEls = [document.getElementById('totalAmount'), document.getElementById('qrTotalAmount')];
        const modalTotalEls = document.querySelectorAll('.modalTotalAmount');
        const paymentAmountInput = document.getElementById('payment_amount');

        function updateUI() {
            const total = (currentSubtotal + deliveryCharge).toFixed(2);
            if (subtotalDisplay) subtotalDisplay.textContent = currentSubtotal.toFixed(2);
            totalAmountEls.forEach(el => { if(el) el.textContent = total; });
            modalTotalEls.forEach(el => { if(el) el.textContent = total; });
            if (paymentAmountInput) {
                paymentAmountInput.value = total;
            }
        }

        if (isDirectBuy && qtyInput) {
            document.getElementById('btnMinus').addEventListener('click', function() {
                let q = parseInt(qtyInput.value) || 1;
                if (q > 1) {
                    q--;
                    qtyInput.value = q;
                    formQtyInput.value = q;
                    currentSubtotal = singleUnitPrice * q;
                    updateUI();
                    calculateDelivery();
                }
            });

            document.getElementById('btnPlus').addEventListener('click', function() {
                let q = parseInt(qtyInput.value) || 1;
                q++;
                qtyInput.value = q;
                formQtyInput.value = q;
                currentSubtotal = singleUnitPrice * q;
                updateUI();
                calculateDelivery();
            });
        }

        let deliveryTimeout = null;
        function debouncedCalculateDelivery() {
            clearTimeout(deliveryTimeout);
            deliveryTimeout = setTimeout(calculateDelivery, 600);
        }

        const formFields = ['address', 'city', 'state', 'pincode'];
        formFields.forEach(field => {
            const el = document.querySelector(`[name="${field}"]`);
            if (el) {
                el.addEventListener('change', calculateDelivery);
                el.addEventListener('keyup', debouncedCalculateDelivery);
            }
        });

        function calculateDelivery() {
            const address = document.querySelector('[name="address"]')?.value || '';
            const city = document.querySelector('[name="city"]')?.value || '';
            const state = document.querySelector('[name="state"]')?.value || '';
            const pincode = document.querySelector('[name="pincode"]')?.value || '';
            const qty = qtyInput ? (parseInt(qtyInput.value) || 1) : {{ $totalQuantity }};

            if (!address || !city || !state || !pincode) return;

            let payload = {
                address: address,
                city: city,
                state: state,
                pincode: pincode,
                subtotal: currentSubtotal
            };

            @if($isDirectBuy && $directProduct)
                payload.product_id = {{ $directProduct->id }};
                payload.quantity = qty;
            @endif

            fetch('{{ route('checkout.calculate_delivery') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    deliveryCharge = parseFloat(data.charge) || 0;
                    const deliveryEls = document.querySelectorAll('.delivery-charge-display');
                    deliveryEls.forEach(el => {
                        el.innerHTML = deliveryCharge > 0 ? '₹' + deliveryCharge.toFixed(2) : '<span class="text-success fw-bold">Free</span>';
                    });
                    updateUI();
                }
            })
            .catch(error => console.error('Error calculating delivery:', error));
        }

        // Form submission prevention of double-submits
        checkoutForm.addEventListener('submit', function() {
            const btn = document.getElementById('btnPlaceOrder');
            if (btn && this.checkValidity()) {
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Placing Order...';
            }
        });

        updateUI();
    });
</script>
@endpush
