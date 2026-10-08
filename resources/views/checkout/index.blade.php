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
                        <form action="{{ route('checkout.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <h5 class="mt-4 mb-3">1. Personal Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email Address (Optional)</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">2. Shipping Address</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control" rows="2" required>{{ old('address') }}</textarea>
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
                                    <input type="number" step="0.01" name="payment_amount" class="form-control" value="{{ old('payment_amount') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                                    <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date') }}" required>
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

                            <button type="submit" class="btn btn-primary btn-lg w-100">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Order Summary -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold mb-4">Order Summary</h4>
                        <div class="d-flex mb-3">
                            @if($product->images && count($product->images) > 0)
                                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            @endif
                            <div>
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                @if($product->offer_price && $product->offer_price > 0)
                                    <span class="text-muted text-decoration-line-through me-2">₹{{ $product->price }}</span>
                                    <span class="text-danger fw-bold">₹<span id="priceDisplay">{{ $product->offer_price }}</span></span>
                                @else
                                    <span class="fw-bold">₹<span id="priceDisplay">{{ $product->price }}</span></span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Quantity</span>
                            <div class="input-group" style="width: 120px;">
                                <button class="btn btn-outline-secondary btn-sm" type="button" id="btnMinus">-</button>
                                <input type="number" class="form-control text-center form-control-sm" id="qtyInput" value="1" min="1" form="checkoutForm" readonly>
                                <button class="btn btn-outline-secondary btn-sm" type="button" id="btnPlus">+</button>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">Total Amount</h5>
                            <h5 class="fw-bold text-primary">₹<span id="totalAmount"></span></h5>
                        </div>
                    </div>
                </div>

                <!-- QR Code Section -->
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Scan QR to Pay</h5>
                        <p class="text-muted small mb-3">Please pay the exact Total Amount shown above using any UPI app (GPay, PhonePe, Paytm).</p>
                        @if($qrCode && $qrCode->value)
                            <div class="bg-white p-3 rounded d-inline-block shadow-sm" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#qrModal">
                                <img src="{{ asset('storage/' . $qrCode->value) }}" alt="Payment QR Code" class="img-fluid" style="max-width: 200px;">
                                <div class="mt-2 text-primary small"><i class="fas fa-search-plus"></i> Click to enlarge</div>
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
                                            <img src="{{ asset('storage/' . $qrCode->value) }}" alt="Payment QR Code" class="img-fluid">
                                            <p class="mt-3 mb-0 fw-bold fs-4 text-primary">Total: ₹<span class="modalTotalAmount"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-white p-5 rounded d-inline-block shadow-sm text-muted border">
                                <i class="fas fa-qrcode fa-3x mb-2"></i>
                                <p class="mb-0">QR Code not set.</p>
                            </div>
                        @endif
                        <p class="mt-4 mb-0 fw-bold text-dark fs-5">Total: ₹<span id="qrTotalAmount"></span></p>
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
        const qtyInput = document.getElementById('qtyInput');
        const formQtyInput = document.createElement('input');
        formQtyInput.type = 'hidden';
        formQtyInput.name = 'quantity';
        formQtyInput.value = qtyInput.value;
        document.querySelector('form').appendChild(formQtyInput);

        const price = parseFloat(document.getElementById('priceDisplay').textContent);
        const totalAmountEls = [document.getElementById('totalAmount'), document.getElementById('qrTotalAmount')];
        const modalTotalEls = document.querySelectorAll('.modalTotalAmount');

        function updateTotal() {
            const qty = parseInt(qtyInput.value);
            const total = (price * qty).toFixed(2);
            totalAmountEls.forEach(el => el.textContent = total);
            modalTotalEls.forEach(el => el.textContent = total);
            formQtyInput.value = qty;
        }

        document.getElementById('btnMinus').addEventListener('click', function() {
            if(qtyInput.value > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
                updateTotal();
            }
        });

        document.getElementById('btnPlus').addEventListener('click', function() {
            qtyInput.value = parseInt(qtyInput.value) + 1;
            updateTotal();
        });

        updateTotal();
    });
</script>
@endpush
