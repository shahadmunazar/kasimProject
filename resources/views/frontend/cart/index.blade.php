@extends('frontend.layouts.main')

@section('meta_title', 'Shopping Cart | TC Smart Technology - Industrial & Embedded Hardware')
@section('meta_description', 'View and manage items in your TC Smart Technology shopping cart. Review selected embedded controllers, IIoT telemetry sensors, and automation products before checkout.')
@section('meta_keywords', 'shopping cart, TC Smart Technology cart, embedded hardware online, industrial IoT products cart, buy automation electronics')

@section('content')
<style>
    .cart-table th {
        background: #f8fafc;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        font-weight: 700;
    }
    .cart-item-row {
        transition: background 0.2s ease;
    }
    .cart-item-row:hover {
        background-color: #f8fafc;
    }
    .qty-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        background: #fff;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .qty-btn:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
</style>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Review Your Selection</span>
          <h1 class="text-capitalize mb-3 text-lg">Shopping Cart</h1>
          <p class="text-white-50 mb-0">Manage quantities, review pricing, and proceed to checkout</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section py-5">
    <div class="container">
        @if($cartItems && $cartItems->count() > 0)
            <div class="row g-4" id="cartContentWrapper">
                <!-- Cart Items Table -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0 text-dark">
                                <i class="fa fa-shopping-cart text-primary me-2"></i> Items in Cart (<span id="cartItemsCountText">{{ $totalCount }}</span>)
                            </h5>
                            <a href="{{ route('products.listing') }}" class="btn btn-outline-secondary btn-sm rounded-pill fw-semibold">
                                <i class="fa fa-arrow-left me-1"></i> Continue Shopping
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table cart-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-4">Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th class="pe-4 text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartTableBody">
                                        @foreach($cartItems as $item)
                                            @php
                                                $prod = $item->product;
                                                $availableStock = $prod ? $prod->availableStock() : 999999;
                                                $isMaxReached = $prod && $prod->track_inventory && ($item->quantity >= $availableStock);
                                                $itemPrice = $item->price ?? $prod->offer_price ?? $prod->price ?? 0;
                                                $itemSubtotal = $itemPrice * $item->quantity;
                                                $itemImg = ($prod && $prod->images && count($prod->images) > 0) ? $prod->images[0] : null;
                                            @endphp
                                            <tr class="cart-item-row" id="cart_row_{{ $item->id }}">
                                                <td class="ps-4 py-3">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('product.details', $prod->slug) }}" class="flex-shrink-0 me-3">
                                                            @if($itemImg)
                                                                <img src="{{ asset('storage/' . $itemImg) }}" alt="{{ $prod->name }}" class="rounded border p-1 bg-white" style="width: 70px; height: 70px; object-fit: contain;">
                                                            @else
                                                                <div class="rounded border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 70px; height: 70px;">
                                                                    <i class="fa fa-box fa-2x"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                        <div>
                                                            <h6 class="mb-1">
                                                                <a href="{{ route('product.details', $prod->slug) }}" class="text-dark text-decoration-none fw-bold">
                                                                    {{ $prod->name }}
                                                                </a>
                                                            </h6>
                                                            @if($prod->category)
                                                                <span class="badge bg-primary bg-opacity-10 text-primary small">{{ $prod->category->name }}</span>
                                                            @endif
                                                            @if($prod->productModel)
                                                                <span class="badge bg-secondary bg-opacity-10 text-secondary small">{{ $prod->productModel->name }}</span>
                                                            @endif

                                                            @if($prod && $prod->track_inventory)
                                                                <div class="mt-1">
                                                                    @if($availableStock <= 0)
                                                                        <span class="badge bg-danger small" style="font-size: 0.72rem;"><i class="fa fa-times-circle me-1"></i>Out of Stock</span>
                                                                    @elseif($availableStock < 10)
                                                                        <span class="badge bg-warning bg-opacity-25 text-dark border border-warning small" style="font-size: 0.72rem;">
                                                                            <i class="fa fa-fire text-danger me-1"></i>Only {{ $availableStock }} available
                                                                        </span>
                                                                    @else
                                                                        <span class="badge bg-light text-muted border small" style="font-size: 0.72rem;">
                                                                            <i class="fa fa-boxes me-1"></i>Available: {{ $availableStock }} in stock
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fw-semibold text-dark">
                                                    ₹{{ number_format($itemPrice, 2) }}
                                                </td>
                                                <td>
                                                    <div class="d-inline-flex align-items-center border rounded p-1 bg-white">
                                                        <button type="button" class="btn btn-sm btn-link text-dark p-0 px-2 text-decoration-none" onclick="updatePageCartQty({{ $item->id }}, {{ $item->quantity - 1 }})" title="Decrease quantity">
                                                            <i class="fa fa-minus small"></i>
                                                        </button>
                                                        <span class="px-2 fw-bold small text-center" style="min-width: 32px;" id="item_qty_{{ $item->id }}">{{ $item->quantity }}</span>
                                                        <button type="button" 
                                                                class="btn btn-sm btn-link text-dark p-0 px-2 text-decoration-none {{ $isMaxReached ? 'disabled text-muted' : '' }}" 
                                                                onclick="{{ $isMaxReached ? 'showCustomAlert(\'warning\', \'Cannot add more. Maximum available stock (' . $availableStock . ') reached.\', \'Stock Limit\')' : 'updatePageCartQty(' . $item->id . ', ' . ($item->quantity + 1) . ')' }}" 
                                                                title="{{ $isMaxReached ? 'Maximum available stock reached (' . $availableStock . ')' : 'Increase quantity' }}">
                                                            <i class="fa fa-plus small {{ $isMaxReached ? 'text-muted' : '' }}"></i>
                                                        </button>
                                                    </div>
                                                    @if($isMaxReached)
                                                        <div class="text-danger small mt-1" style="font-size: 0.72rem;">
                                                            <i class="fa fa-info-circle me-1"></i>Max stock reached
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="fw-bold text-primary fs-6" id="item_subtotal_{{ $item->id }}">
                                                    ₹{{ number_format($itemSubtotal, 2) }}
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-2" onclick="removePageCartItem({{ $item->id }})" title="Remove item">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Card -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px;">
                        <h5 class="fw-bold mb-3 text-dark pb-2 border-bottom">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Total Items:</span>
                            <span class="fw-bold text-dark" id="summaryTotalCount">{{ $totalCount }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal:</span>
                            <span class="fw-bold text-dark fs-5" id="summarySubtotal">₹{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="alert alert-light border small text-muted mb-4">
                            <i class="fa fa-truck text-primary me-1"></i> Delivery charges are calculated based on your selected address during checkout.
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary py-3 fw-bold shadow-sm rounded-3 fs-6">
                                Proceed to Checkout <i class="fa fa-arrow-right ms-2"></i>
                            </a>
                            <a href="{{ route('products.listing') }}" class="btn btn-outline-secondary py-2 fw-semibold rounded-3 mt-1">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="row justify-content-center py-5">
                <div class="col-lg-6 text-center">
                    <div class="card border-0 shadow-sm rounded-4 p-5 bg-light">
                        <i class="fa fa-shopping-cart fa-4x text-muted mb-4 opacity-50"></i>
                        <h3 class="fw-bold text-dark mb-2">Your Shopping Cart is Empty</h3>
                        <p class="text-muted mb-4">Looks like you haven't added any products to your cart yet. Explore our catalog and find the best items for you.</p>
                        <div>
                            <a href="{{ route('products.listing') }}" class="btn btn-primary px-4 py-3 fw-bold rounded-pill shadow-sm">
                                <i class="fa fa-box-open me-2"></i> Explore Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    function updatePageCartQty(itemId, newQty) {
        if (newQty <= 0) {
            removePageCartItem(itemId);
            return;
        }

        $.ajax({
            url: "{{ route('cart.update') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                item_id: itemId,
                quantity: newQty
            },
            success: function(res) {
                if (res.success) {
                    location.reload();
                }
            },
            error: function(err) {
                var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'Cannot add more. Maximum available stock reached.';
                showCustomAlert('warning', msg, 'Stock Limit Reached');
            }
        });
    }

    function removePageCartItem(itemId) {
        if (!confirm('Remove this item from your cart?')) return;

        $.ajax({
            url: "{{ route('cart.remove') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                item_id: itemId
            },
            success: function(res) {
                if (res.success) {
                    location.reload();
                }
            }
        });
    }
</script>
@endpush
