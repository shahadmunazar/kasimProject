@extends('frontend.layouts.main')

@section('meta_title', 'Checkout')

@push('styles')
<style>
    .saved-addr-card {
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
        background: #ffffff;
    }
    .saved-addr-card:hover {
        border-color: #0d6efd !important;
        box-shadow: 0 4px 14px rgba(13, 110, 253, 0.12);
        transform: translateY(-2px);
    }
    .saved-addr-card.active-addr {
        border-color: #0d6efd !important;
        background-color: #f0f7ff !important;
        box-shadow: 0 2px 10px rgba(13, 110, 253, 0.15);
    }
    .saved-addr-card .form-check-input {
        cursor: pointer;
        width: 1.15em;
        height: 1.15em;
    }
    .border-dashed {
        border-style: dashed !important;
    }
</style>
@endpush

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

                            @auth
                                @if(isset($userAddresses) && $userAddresses->isNotEmpty())
                                    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                                        <h5 class="mb-0 fw-bold"><i class="fa fa-map-marker-alt text-primary me-2"></i>2. Shipping Address</h5>
                                        <span class="badge bg-light text-primary border border-primary-subtle px-2 py-1">
                                            <i class="fa fa-address-book me-1"></i> {{ $userAddresses->count() }} Saved {{ Str::plural('Address', $userAddresses->count()) }}
                                        </span>
                                    </div>
                                    <p class="text-muted small mb-3">Choose a saved delivery address or enter a new location below.</p>

                                    <div class="row g-3 mb-3" id="savedAddressesGrid">
                                        @foreach($userAddresses as $addr)
                                            @php
                                                $isAddrChecked = old('address_id', $defaultAddress->id ?? null) == $addr->id;
                                                $fullStreet = trim($addr->address_line_1 . ($addr->address_line_2 ? ', ' . $addr->address_line_2 : ''));
                                            @endphp
                                            <div class="col-md-6">
                                                <div class="card h-100 saved-addr-card border {{ $isAddrChecked ? 'border-primary active-addr' : 'border-secondary-subtle' }}"
                                                     style="cursor: pointer;"
                                                     onclick="selectSavedAddress('{{ $addr->id }}')">
                                                    <div class="card-body p-3">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input addr-radio" type="radio" name="address_id" id="addr_{{ $addr->id }}" value="{{ $addr->id }}"
                                                                       {{ $isAddrChecked ? 'checked' : '' }}
                                                                       data-name="{{ e($addr->name ?: (Auth::user()->name ?? '')) }}"
                                                                       data-phone="{{ e($addr->phone ?: (Auth::user()->phone ?? '')) }}"
                                                                       data-address="{{ e($fullStreet) }}"
                                                                       data-city="{{ e($addr->city) }}"
                                                                       data-state="{{ e($addr->state) }}"
                                                                       data-pincode="{{ e($addr->zip) }}"
                                                                       onchange="handleAddressRadioChange(this)">
                                                                <label class="form-check-label fw-bold text-dark ps-1" for="addr_{{ $addr->id }}" style="cursor: pointer;">
                                                                    {{ $addr->name ?: (Auth::user()->name ?? 'Primary Contact') }}
                                                                </label>
                                                            </div>
                                                            @if($addr->is_default)
                                                                <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size: 0.72rem;">Default</span>
                                                            @endif
                                                        </div>
                                                        <div class="text-muted small ps-4 mb-1">
                                                            <i class="fa fa-phone-alt me-1 text-muted" style="font-size: 0.75rem;"></i> {{ $addr->phone ?: (Auth::user()->phone ?? 'N/A') }}
                                                        </div>
                                                        <div class="text-secondary small ps-4" style="line-height: 1.35;">
                                                            <i class="fa fa-map-pin me-1 text-muted" style="font-size: 0.75rem;"></i>
                                                            {{ $fullStreet }}<br>
                                                            {{ $addr->city }}, {{ $addr->state }} - <span class="fw-semibold text-dark">{{ $addr->zip }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- Option to use new / custom address -->
                                        <div class="col-md-6">
                                            <div class="card h-100 saved-addr-card border {{ old('address_id') === 'new' ? 'border-primary active-addr' : 'border-dashed' }}"
                                                 style="cursor: pointer; border-style: dashed !important; border-width: 2px;"
                                                 onclick="selectSavedAddress('new')">
                                                <div class="card-body p-3 d-flex flex-column justify-content-center align-items-center text-center">
                                                    <div class="form-check mb-1">
                                                        <input class="form-check-input addr-radio" type="radio" name="address_id" id="addr_new" value="new"
                                                               {{ old('address_id') === 'new' ? 'checked' : '' }}
                                                               onchange="handleAddressRadioChange(this)">
                                                        <label class="form-check-label fw-bold text-primary ps-1" for="addr_new" style="cursor: pointer;">
                                                            + Deliver to a Different Address
                                                        </label>
                                                    </div>
                                                    <small class="text-muted">Enter a custom or new delivery address below</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert alert-light border py-2 px-3 small d-flex justify-content-between align-items-center mb-3" id="savedAddressNotice" style="display: none;">
                                        <div class="text-muted">
                                            <i class="fa fa-check-circle text-success me-1"></i> Delivery address details loaded. You can verify or edit the fields below.
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                                        <h5 class="mb-0 fw-bold"><i class="fa fa-map-marker-alt text-primary me-2"></i>2. Shipping Address</h5>
                                        <span class="badge bg-light text-secondary border px-2 py-1">New Address</span>
                                    </div>
                                    <input type="hidden" name="address_id" value="new">
                                @endif
                            @else
                                <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                                    <h5 class="mb-0 fw-bold"><i class="fa fa-map-marker-alt text-primary me-2"></i>2. Shipping Address</h5>
                                </div>
                                <div class="alert alert-light border py-2 px-3 small d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <i class="fa fa-user-circle text-primary me-2"></i> Already have saved addresses?
                                        <a href="{{ Route::has('login') ? route('login') : (Route::has('frontend.auth.login') ? route('frontend.auth.login') : url('/login')) }}?redirect={{ urlencode(url()->current()) }}" class="text-primary fw-bold text-decoration-underline ms-1">Sign in</a> to auto-fill your delivery details.
                                    </div>
                                </div>
                                <input type="hidden" name="address_id" value="new">
                            @endauth

                            <div id="manualAddressFields">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address (House / Flat, Street, Area) <span class="text-danger">*</span></label>
                                        <textarea name="address" id="shippingAddress" class="form-control" rows="2" required placeholder="House/Flat No., Street, Landmark">{{ old('address') }}</textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="shippingCity" class="form-control" value="{{ old('city') }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="shippingState" class="form-control" value="{{ old('state') }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="shippingPincode" class="form-control" value="{{ old('pincode') }}" required>
                                    </div>
                                </div>

                                @auth
                                    <div class="form-check mb-3" id="saveNewAddressWrapper" style="{{ (isset($userAddresses) && $userAddresses->isNotEmpty() && old('address_id', $defaultAddress->id ?? null) !== 'new') ? 'display: none;' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="save_new_address" id="saveNewAddressCheck" value="1" {{ old('save_new_address') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted small" for="saveNewAddressCheck">
                                            <i class="fa fa-bookmark text-primary me-1"></i> Save this address to my account for future orders
                                        </label>
                                    </div>
                                @endauth
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
                        @if($isDirectBuy && $directProduct)
                        @php
                            $directAvailStock = $directProduct->availableStock();
                            $isDirectTrack = $directProduct->track_inventory;
                        @endphp
                        <div class="d-flex justify-content-between align-items-center mb-3 bg-light p-2 rounded">
                            <div>
                                <span class="small fw-semibold text-muted d-block">Adjust Quantity:</span>
                                @if($isDirectTrack)
                                    <small class="text-muted" style="font-size: 0.72rem;">
                                        <i class="fa fa-boxes me-1"></i>Available: <span class="fw-bold text-dark">{{ $directAvailStock }}</span>
                                    </small>
                                @endif
                            </div>
                            <div class="input-group input-group-sm" style="width: 110px;">
                                <button class="btn btn-outline-secondary" type="button" id="btnMinus">-</button>
                                <input type="number" class="form-control text-center" id="qtyInput" value="{{ $totalQuantity }}" min="1" max="{{ $directAvailStock }}" readonly>
                                <button class="btn btn-outline-secondary" type="button" id="btnPlus" {{ ($isDirectTrack && $totalQuantity >= $directAvailStock) ? 'disabled' : '' }}>+</button>
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
            const maxDirectStock = {{ ($isDirectBuy && $directProduct && $directProduct->track_inventory) ? $directProduct->availableStock() : 999999 }};
            const btnPlus = document.getElementById('btnPlus');
            const btnMinus = document.getElementById('btnMinus');

            if (btnMinus) {
                btnMinus.addEventListener('click', function() {
                    let q = parseInt(qtyInput.value) || 1;
                    if (q > 1) {
                        q--;
                        qtyInput.value = q;
                        formQtyInput.value = q;
                        currentSubtotal = singleUnitPrice * q;
                        if (btnPlus) btnPlus.disabled = (q >= maxDirectStock);
                        updateUI();
                        calculateDelivery();
                    }
                });
            }

            if (btnPlus) {
                btnPlus.addEventListener('click', function() {
                    let q = parseInt(qtyInput.value) || 1;
                    if (q < maxDirectStock) {
                        q++;
                        qtyInput.value = q;
                        formQtyInput.value = q;
                        currentSubtotal = singleUnitPrice * q;
                        if (q >= maxDirectStock) {
                            btnPlus.disabled = true;
                        }
                        updateUI();
                        calculateDelivery();
                    } else {
                        btnPlus.disabled = true;
                        if (typeof showCustomAlert === 'function') {
                            showCustomAlert('warning', 'Cannot add more. Only ' + maxDirectStock + ' items available in stock.', 'Stock Limit');
                        } else {
                            alert('Cannot add more. Only ' + maxDirectStock + ' items available in stock.');
                        }
                    }
                });
            }
        }

        // Saved address handlers
        window.selectSavedAddress = function(addrId) {
            const radio = document.getElementById('addr_' + addrId);
            if (radio) {
                radio.checked = true;
                handleAddressRadioChange(radio);
            }
        };

        window.handleAddressRadioChange = function(radio) {
            document.querySelectorAll('.saved-addr-card').forEach(card => {
                card.classList.remove('border-primary', 'active-addr');
                if (card.style.borderStyle === 'dashed') {
                    card.classList.add('border-dashed');
                } else {
                    card.classList.add('border-secondary-subtle');
                }
            });

            const parentCard = radio.closest('.saved-addr-card');
            if (parentCard) {
                parentCard.classList.remove('border-secondary-subtle', 'border-dashed');
                parentCard.classList.add('border-primary', 'active-addr');
            }

            const saveNewWrapper = document.getElementById('saveNewAddressWrapper');
            const noticeEl = document.getElementById('savedAddressNotice');
            const nameInput = document.querySelector('input[name="customer_name"]');
            const phoneInput = document.querySelector('input[name="mobile"]');
            const addrInput = document.getElementById('shippingAddress');
            const cityInput = document.getElementById('shippingCity');
            const stateInput = document.getElementById('shippingState');
            const pinInput = document.getElementById('shippingPincode');

            if (radio.value === 'new') {
                if (saveNewWrapper) saveNewWrapper.style.display = 'block';
                if (noticeEl) noticeEl.style.display = 'none';

                if (addrInput) addrInput.value = '';
                if (cityInput) cityInput.value = '';
                if (stateInput) stateInput.value = '';
                if (pinInput) pinInput.value = '';
                if (addrInput) addrInput.focus();

                const deliveryEls = document.querySelectorAll('.delivery-charge-display');
                deliveryEls.forEach(el => {
                    el.innerHTML = '<span id="deliveryChargeText">Enter address to calculate</span>';
                });
                deliveryCharge = 0;
                updateUI();
            } else {
                if (saveNewWrapper) saveNewWrapper.style.display = 'none';
                if (noticeEl) noticeEl.style.display = 'flex';

                if (radio.dataset.name && nameInput) nameInput.value = radio.dataset.name;
                if (radio.dataset.phone && phoneInput) phoneInput.value = radio.dataset.phone;
                if (radio.dataset.address && addrInput) addrInput.value = radio.dataset.address;
                if (radio.dataset.city && cityInput) cityInput.value = radio.dataset.city;
                if (radio.dataset.state && stateInput) stateInput.value = radio.dataset.state;
                if (radio.dataset.pincode && pinInput) pinInput.value = radio.dataset.pincode;

                calculateDelivery();
            }
        };

        // If user manually types into address fields while a saved address card was active, switch to "new" mode
        const addrInput = document.getElementById('shippingAddress');
        const cityInput = document.getElementById('shippingCity');
        const stateInput = document.getElementById('shippingState');
        const pinInput = document.getElementById('shippingPincode');
        const saveNewWrapper = document.getElementById('saveNewAddressWrapper');
        const noticeEl = document.getElementById('savedAddressNotice');

        [addrInput, cityInput, stateInput, pinInput].forEach(inp => {
            if (inp) {
                inp.addEventListener('input', function() {
                    const newRadio = document.getElementById('addr_new');
                    const currentChecked = document.querySelector('input[name="address_id"]:checked');
                    if (newRadio && currentChecked && currentChecked.value !== 'new') {
                        newRadio.checked = true;
                        document.querySelectorAll('.saved-addr-card').forEach(card => {
                            card.classList.remove('border-primary', 'active-addr');
                            if (card.style.borderStyle === 'dashed') card.classList.add('border-dashed');
                            else card.classList.add('border-secondary-subtle');
                        });
                        const newCard = newRadio.closest('.saved-addr-card');
                        if (newCard) {
                            newCard.classList.remove('border-dashed');
                            newCard.classList.add('border-primary', 'active-addr');
                        }
                        if (saveNewWrapper) saveNewWrapper.style.display = 'block';
                        if (noticeEl) noticeEl.style.display = 'none';
                    }
                });
            }
        });

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
            const checkedRadio = document.querySelector('input[name="address_id"]:checked');
            const addressId = (checkedRadio && checkedRadio.value !== 'new') ? checkedRadio.value : null;
            const address = document.querySelector('[name="address"]')?.value || '';
            const city = document.querySelector('[name="city"]')?.value || '';
            const state = document.querySelector('[name="state"]')?.value || '';
            const pincode = document.querySelector('[name="pincode"]')?.value || '';
            const qty = qtyInput ? (parseInt(qtyInput.value) || 1) : {{ $totalQuantity }};

            if (!addressId) {
                if (!address || !city || !state || !pincode) return;
            }

            let payload = {
                address_id: addressId,
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

        // Auto-select initial address if present and calculate delivery upfront
        const initialRadio = document.querySelector('input[name="address_id"]:checked');
        if (initialRadio) {
            handleAddressRadioChange(initialRadio);
        } else {
            calculateDelivery();
        }

        updateUI();
    });
</script>
@endpush
