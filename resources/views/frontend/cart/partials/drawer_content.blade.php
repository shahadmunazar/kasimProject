@if($cartItems && $cartItems->count() > 0)
    <div class="offcanvas-cart-items-list p-3" style="max-height: calc(100vh - 260px); overflow-y: auto;">
        @foreach($cartItems as $item)
            @php
                $itemProduct = $item->product;
                $availStock = $itemProduct ? $itemProduct->availableStock() : 999999;
                $isMaxStock = $itemProduct && $itemProduct->track_inventory && ($item->quantity >= $availStock);
                $itemPrice = $item->price ?? $itemProduct->offer_price ?? $itemProduct->price ?? 0;
                $itemSubtotal = $itemPrice * $item->quantity;
                $itemImg = ($itemProduct && $itemProduct->images && count($itemProduct->images) > 0) ? $itemProduct->images[0] : null;
            @endphp
            <div class="cart-drawer-item d-flex align-items-center gap-3 p-3 mb-2 rounded-3 bg-light border position-relative">
                <!-- Product Thumbnail -->
                <a href="{{ route('product.details', $itemProduct->slug) }}" class="flex-shrink-0">
                    @if($itemImg)
                        <img src="{{ asset('storage/' . $itemImg) }}" alt="{{ $itemProduct->name }}" class="rounded border bg-white p-1" style="width: 65px; height: 65px; object-fit: contain;">
                    @else
                        <div class="rounded border bg-white d-flex align-items-center justify-content-center text-muted" style="width: 65px; height: 65px;">
                            <i class="fa fa-box"></i>
                        </div>
                    @endif
                </a>

                <!-- Product Details -->
                <div class="flex-grow-1 min-w-0">
                    <h6 class="mb-1 text-truncate" style="font-size: 0.92rem;">
                        <a href="{{ route('product.details', $itemProduct->slug) }}" class="text-dark text-decoration-none fw-bold" title="{{ $itemProduct->name }}">
                            {{ $itemProduct->name }}
                        </a>
                    </h6>
                    <div class="d-flex align-items-center text-muted small mb-1">
                        <span class="fw-bold text-primary">₹{{ number_format($itemPrice, 2) }}</span>
                        <span class="mx-1">&times;</span>
                        <span class="fw-semibold">{{ $item->quantity }}</span>
                        <span class="ms-auto fw-bold text-dark fs-6">₹{{ number_format($itemSubtotal, 2) }}</span>
                    </div>

                    @if($itemProduct && $itemProduct->track_inventory)
                        <div class="mb-2">
                            @if($availStock <= 0)
                                <span class="badge bg-danger small" style="font-size:0.7rem;"><i class="fa fa-times-circle me-1"></i>Out of Stock</span>
                            @elseif($availStock < 10)
                                <span class="badge bg-warning bg-opacity-25 text-dark border border-warning small" style="font-size:0.7rem;">
                                    <i class="fa fa-fire text-danger me-1"></i>Only {{ $availStock }} left
                                </span>
                            @else
                                <span class="badge bg-white text-muted border small" style="font-size:0.7rem;">
                                    <i class="fa fa-boxes me-1"></i>Available: {{ $availStock }}
                                </span>
                            @endif
                        </div>
                    @endif

                    <!-- Quantity Controls -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="btn-group btn-group-sm border rounded bg-white shadow-xs" role="group">
                            <button type="button" class="btn btn-sm btn-link text-dark px-2 text-decoration-none" onclick="updateCartItemQty({{ $item->id }}, {{ $item->quantity - 1 }})" title="Decrease">
                                <i class="fa fa-minus small"></i>
                            </button>
                            <span class="px-2 py-1 fw-bold small text-center" style="min-width: 28px;">{{ $item->quantity }}</span>
                            <button type="button" 
                                    class="btn btn-sm btn-link text-dark px-2 text-decoration-none {{ $isMaxStock ? 'disabled text-muted' : '' }}" 
                                    onclick="{{ $isMaxStock ? 'showCustomAlert(\'warning\', \'Cannot add more. Only ' . $availStock . ' items available in stock.\', \'Stock Limit\')' : 'updateCartItemQty(' . $item->id . ', ' . ($item->quantity + 1) . ')' }}" 
                                    title="{{ $isMaxStock ? 'Maximum available stock reached (' . $availStock . ')' : 'Increase' }}">
                                <i class="fa fa-plus small {{ $isMaxStock ? 'text-muted' : '' }}"></i>
                            </button>
                        </div>

                        <!-- Remove Button -->
                        <button type="button" class="btn btn-sm btn-link text-danger p-0 text-decoration-none small" onclick="removeCartItem({{ $item->id }})" title="Remove item">
                            <i class="fa fa-trash-alt me-1"></i> Remove
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Drawer Footer Summary -->
    <div class="offcanvas-cart-footer border-top p-3 bg-white mt-auto">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted small">Items in Cart:</span>
            <span class="fw-bold text-dark">{{ $totalCount }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold fs-5 text-dark">Subtotal:</span>
            <span class="fw-bold fs-4 text-primary">₹{{ number_format($subtotal, 2) }}</span>
        </div>
        <div class="d-grid gap-2">
            <a href="{{ route('cart.index') }}" class="btn btn-outline-primary py-2 fw-semibold">
                <i class="fa fa-shopping-bag me-1"></i> View Full Cart
            </a>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary py-2 fw-bold shadow-sm">
                Proceed to Checkout <i class="fa fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
@else
    <div class="d-flex flex-column align-items-center justify-content-center p-5 text-center my-auto">
        <div class="rounded-circle bg-light p-4 mb-3 text-muted">
            <i class="fa fa-shopping-cart fa-3x opacity-50"></i>
        </div>
        <h5 class="fw-bold text-dark mb-2">Your Cart is Empty</h5>
        <p class="text-muted small mb-4">Discover our products and start adding items to your cart!</p>
        <a href="{{ route('products.listing') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold" onclick="bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasCart'))?.hide()">
            <i class="fa fa-shopping-bag me-1"></i> Browse Products
        </a>
    </div>
@endif
