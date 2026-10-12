@php
    $cardPrefix = $prefix ?? 'prod_';
    $carouselId = 'carousel_' . $cardPrefix . $product->id;
    $productUrl = route('product.details', $product->slug);
@endphp

<div class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
    <div class="card w-100 shadow-sm border-0 product-item-card d-flex flex-column">
        @if($product->images && count($product->images) > 0)
            @if(count($product->images) > 1)
                <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $index => $img)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <a href="{{ $productUrl }}" title="{{ $product->name }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
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
                    <img src="{{ asset('storage/' . $product->images[0]) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
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
                    <span class="card-text fs-5"><del class="text-muted small">${{ $product->price }}</del> <strong class="text-danger">${{ $product->offer_price }}</strong></span>
                @elseif($product->price)
                    <span class="card-text fs-5 fw-bold text-dark">${{ $product->price }}</span>
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
                <a href="{{ $productUrl }}" class="btn btn-sm btn-outline-primary px-2" title="View Details">
                    <i class="fa fa-eye me-1"></i> Details
                </a>
                <button type="button" class="btn btn-sm btn-secondary px-2" data-bs-toggle="modal" data-bs-target="#buyModal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">
                    <i class="fa fa-envelope me-1"></i> Enquiry
                </button>
                <a href="{{ route('checkout.index', $product->id) }}" class="btn btn-sm btn-primary px-2">
                    <i class="fa fa-shopping-cart me-1"></i> Buy Now
                </a>
            </div>
        </div>
    </div>
</div>
