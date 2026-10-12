@php
    $cardPrefix = $prefix ?? 'prod_';
    $carouselId = 'carousel_' . $cardPrefix . $product->id;
    $productUrl = route('product.details', $product->slug);
    $wrapperColClass = $colClass ?? 'col-lg-4 col-md-6 col-12 mb-4';
@endphp

<div class="{{ $wrapperColClass }} d-flex product-card-wrapper"
     data-category-id="{{ $product->category_id }}"
     data-category-slug="{{ $product->category->slug ?? '' }}"
     data-model-id="{{ $product->product_model_id ?? '' }}"
     data-model-slug="{{ $product->productModel->slug ?? '' }}"
     data-name="{{ strtolower($product->name) }}"
     data-price="{{ $product->offer_price ?: $product->price ?: 0 }}">
    <div class="card w-100 shadow-sm border-0 product-item-card d-flex flex-column position-relative">
        <!-- Floating Wishlist Button -->
        <button type="button" 
                class="btn btn-sm btn-white rounded-circle shadow-sm position-absolute wishlist-toggle-btn"
                style="top: 10px; right: 10px; z-index: 5; width: 34px; height: 34px; padding: 0; display: inline-flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(4px);"
                onclick="toggleWishlist({{ $product->id }}, this)"
                data-product-id="{{ $product->id }}"
                title="Add to Wishlist">
            <i class="fa fa-heart text-muted" style="font-size: 0.95rem; transition: transform 0.2s ease, color 0.2s ease;"></i>
        </button>

        @if($product->images && count($product->images) > 0)
            @if(count($product->images) > 1)
                <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $index => $img)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <a href="{{ $productUrl }}" title="{{ $product->name }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="card-img-top" alt="{{ $product->name }}" loading="lazy" style="height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    </button>
                </div>
            @else
                <a href="{{ $productUrl }}" title="{{ $product->name }}">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" class="card-img-top" alt="{{ $product->name }}" loading="lazy" style="height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                </a>
            @endif
        @else
            <a href="{{ $productUrl }}" class="text-decoration-none">
                <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                    <i class="fa fa-image fa-3x text-secondary opacity-50"></i>
                </div>
            </a>
        @endif

        <div class="card-body text-center d-flex flex-column p-3">
            <!-- Category and Model Badges -->
            <div class="mb-2" style="min-height: 26px;">
                @if($product->category)
                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 me-1">{{ $product->category->name }}</span>
                @endif
                @if($product->productModel)
                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1"><i class="fa fa-tag me-1"></i>{{ $product->productModel->name }}</span>
                @endif
            </div>

            <!-- Product Title (Aligned to 2 lines) -->
            <h5 class="card-title fw-bold mb-2 text-truncate-2" style="min-height: 48px; max-height: 48px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.3;">
                <a href="{{ $productUrl }}" class="text-dark text-decoration-none" title="{{ $product->name }}">
                    {{ $product->name }}
                </a>
            </h5>

            <!-- Price -->
            <div class="mb-3" style="min-height: 28px;">
                @if($product->offer_price)
                    <span class="card-text fs-5"><del class="text-muted small">₹{{ number_format($product->price, 2) }}</del> <strong class="text-danger">₹{{ number_format($product->offer_price, 2) }}</strong></span>
                @elseif($product->price)
                    <span class="card-text fs-5 fw-bold text-dark">₹{{ number_format($product->price, 2) }}</span>
                @else
                    <span class="text-muted small">Price on request</span>
                @endif
            </div>

            <!-- Description Preview Box (Aligned height & redirects to Product Details Page) -->
            <a href="{{ $productUrl }}" class="text-decoration-none text-reset d-block mb-3" title="Click to view full description on product page">
                <div class="product-desc-box text-start bg-light rounded p-2 border" 
                     style="min-height: 72px; max-height: 72px; overflow: hidden; transition: background-color 0.2s ease;">
                    <p class="mb-0 text-muted small" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4;">
                        {{ \Illuminate\Support\Str::limit(strip_tags($product->description ?? 'No description available.'), 90) }}
                    </p>
                    <div class="text-primary fw-semibold small mt-1 d-flex align-items-center" style="font-size: 0.78rem;">
                        <span>View Full Description</span>
                        <i class="fa fa-arrow-right ms-1"></i>
                    </div>
                </div>
            </a>

            <!-- Action Buttons (Pinned to bottom for uniform card alignment) -->
            <div class="d-flex justify-content-center flex-wrap gap-1 mt-auto pt-2 border-top">
                <button type="button" class="btn btn-sm btn-outline-primary px-2" onclick="addToCart({{ $product->id }}, 1, this)" title="Add to Cart">
                    <i class="fa fa-cart-plus me-1"></i> Cart
                </button>
                <a href="{{ route('checkout.index', $product->id) }}" class="btn btn-sm btn-primary px-2" title="Buy Now directly">
                    <i class="fa fa-bolt me-1"></i> Buy Now
                </a>
                <button type="button" class="btn btn-sm btn-light border px-2 text-muted" data-bs-toggle="modal" data-bs-target="#buyModal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}" title="Enquiry">
                    <i class="fa fa-envelope"></i>
                </button>
                <a href="{{ $productUrl }}" class="btn btn-sm btn-light border px-2 text-muted" title="View Details">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
    </div>
</div>
