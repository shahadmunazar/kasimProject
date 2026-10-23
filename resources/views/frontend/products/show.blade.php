@extends('frontend.layouts.main')

@section('content')
<section class="py-5 bg-light">
    <div class="container mt-5 pt-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.listing') }}">Products</a></li>
            @if($product->category)
                <li class="breadcrumb-item"><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            @endif
            @if($product->productModel)
                <li class="breadcrumb-item"><a href="{{ route('products.model', [$product->category->slug, $product->productModel->slug]) }}">{{ $product->productModel->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
          </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 mb-4">
                @if($product->images && count($product->images) > 0)
                    @if(count($product->images) > 1)
                        <div id="carouselProductDetails" class="carousel slide border rounded bg-white shadow-sm" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($product->images as $index => $img)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="{{ $product->name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductDetails" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductDetails" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                            </button>
                        </div>
                    @else
                        <div class="border rounded bg-white shadow-sm text-center">
                            <img src="{{ asset('storage/' . $product->images[0]) }}" class="img-fluid" alt="{{ $product->name }}" style="height: 400px; object-fit: contain;">
                        </div>
                    @endif
                @else
                    <div class="border rounded bg-white shadow-sm d-flex align-items-center justify-content-center" style="height: 400px;">
                        <span class="text-muted">No Image Available</span>
                    </div>
                @endif
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h2 class="card-title fw-bold">{{ $product->name }}</h2>
                            <button id="likeBtn" class="btn btn-sm rounded-pill d-flex align-items-center gap-1 {{ $hasLiked ? 'btn-danger text-white' : 'btn-outline-danger' }}" data-id="{{ $product->id }}">
                                <i class="{{ $hasLiked ? 'fas' : 'far' }} fa-heart"></i> <span id="likesCount">{{ $product->likes ?? 0 }}</span> Likes
                            </button>
                        </div>
                        
                        <div class="mb-3">
                            @if($product->category)
                                <span class="badge bg-secondary me-1">{{ $product->category->name }}</span>
                            @endif
                            @if($product->productModel)
                                <span class="badge bg-info">{{ $product->productModel->name }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            @if($product->offer_price)
                                <h3 class="text-danger mb-0">₹{{ number_format($product->offer_price, 2) }}</h3>
                                <p class="text-muted mb-0"><del>₹{{ number_format($product->price, 2) }}</del></p>
                            @elseif($product->price)
                                <h3 class="mb-0">₹{{ number_format($product->price, 2) }}</h3>
                            @endif
                        </div>

                        <!-- Real-Time Stock Status & Availability -->
                        <div class="mb-4 p-3 rounded-3 border bg-light">
                            @if($product->sku)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted font-monospace">SKU: <strong class="text-dark">{{ $product->sku }}</strong></small>
                                    @if($product->barcode)
                                        <small class="text-muted font-monospace">BARCODE: <strong class="text-dark">{{ $product->barcode }}</strong></small>
                                    @endif
                                </div>
                            @endif

                            @php
                                $stockAvailable = $product->availableStock();
                            @endphp

                            @if($product->isOutOfStock())
                                <div>
                                    <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">
                                        <i class="fa fa-times-circle me-1"></i> Out of Stock
                                    </span>
                                    <small class="text-danger d-block mt-2 fw-semibold">
                                        <i class="fa fa-info-circle me-1"></i> Currently unavailable. Please send an enquiry to be notified when re-stocked.
                                    </small>
                                </div>
                            @elseif($stockAvailable <= 10)
                                <div>
                                    <div class="d-inline-flex align-items-center gap-2 flex-wrap mb-2">
                                        <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill shadow-xs border border-warning-subtle">
                                            <i class="fa fa-fire text-danger me-1"></i> Only {{ $stockAvailable }} {{ $stockAvailable === 1 ? 'item' : 'items' }} left in stock — order soon!
                                        </span>
                                        <span class="badge bg-white text-muted border small">
                                            <i class="fa fa-bolt text-warning me-1"></i> Fast Dispatch
                                        </span>
                                    </div>
                                    <div class="mt-2" style="max-width: 320px;">
                                        <div class="d-flex justify-content-between text-muted mb-1" style="font-size: 11.5px;">
                                            <span class="text-danger fw-bold"><i class="fa fa-exclamation-circle me-1"></i>Limited Inventory</span>
                                            <span class="fw-bold font-monospace text-dark">{{ $stockAvailable }} left</span>
                                        </div>
                                        <div class="progress" style="height: 7px; border-radius: 6px; background: #e2e8f0;">
                                            <div class="progress-bar bg-warning bg-gradient progress-bar-striped progress-bar-animated" 
                                                 role="progressbar" 
                                                 style="width: {{ min(100, max(12, ($stockAvailable / 10) * 100)) }}%;" 
                                                 aria-valuenow="{{ $stockAvailable }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="10"></div>
                                        </div>
                                        <small class="text-muted d-block mt-1" style="font-size: 11px;">
                                            Hurry, items in high demand sell out quickly!
                                        </small>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <span class="badge bg-success fs-6 px-3 py-2 rounded-pill">
                                        <i class="fa fa-check-circle me-1"></i> In Stock ({{ $stockAvailable }} available)
                                    </span>
                                    <small class="text-success d-block mt-1">
                                        <i class="fa fa-truck me-1"></i> Verified warehouse stock, ready to dispatch.
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4" id="product-description">
                            <h5 class="fw-bold mb-3 border-bottom pb-2">Description</h5>
                            <div class="text-secondary product-full-description" style="line-height: 1.8; font-size: 1rem;">
                                @if(!empty(trim(strip_tags($product->description ?? ''))))
                                    {!! $product->description !!}
                                @else
                                    <p class="text-muted fst-italic">No description available for this product.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Quantity Selector and Action Buttons -->
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted">Quantity</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="input-group" style="width: 140px;">
                                    <button class="btn btn-outline-secondary" type="button" {{ $product->isOutOfStock() ? 'disabled' : '' }} onclick="var q=document.getElementById('detailQtyInput'); if(parseInt(q.value)>1) q.value=parseInt(q.value)-1;">-</button>
                                    <input type="number" id="detailQtyInput" class="form-control text-center fw-bold" value="1" min="1" max="{{ $product->availableStock() }}" {{ $product->isOutOfStock() ? 'disabled' : '' }} oninput="if(parseInt(this.value) > {{ $product->availableStock() }}) { this.value = {{ $product->availableStock() }}; if(typeof showCustomAlert === 'function') showCustomAlert('warning', 'Only {{ $product->availableStock() }} items available in stock', 'Stock Limit'); }">
                                    <button class="btn btn-outline-secondary" type="button" {{ $product->isOutOfStock() ? 'disabled' : '' }} onclick="var q=document.getElementById('detailQtyInput'); if(parseInt(q.value) < {{ $product->availableStock() }}) q.value=parseInt(q.value)+1; else { if(typeof showCustomAlert === 'function') showCustomAlert('warning', 'Only {{ $product->availableStock() }} items available in stock', 'Stock Limit'); else alert('Only {{ $product->availableStock() }} items available in stock'); }">+</button>
                                </div>
                                <button type="button" class="btn btn-outline-danger px-3 py-2 rounded-3 d-flex align-items-center gap-2" onclick="toggleWishlist({{ $product->id }}, this)">
                                    <i class="fa fa-heart"></i>
                                    <span>Wishlist</span>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 w-100">
                            @if(!$product->isOutOfStock())
                                <button type="button" class="btn btn-outline-primary btn-lg flex-fill" onclick="addToCart({{ $product->id }}, parseInt(document.getElementById('detailQtyInput').value)||1, this)">
                                    <i class="fa fa-cart-plus me-2"></i> Add to Cart
                                </button>
                                <a href="{{ route('checkout.index', $product->id) }}" class="btn btn-primary btn-lg flex-fill">
                                    <i class="fa fa-bolt me-1"></i> Buy Now
                                </a>
                            @else
                                <button type="button" class="btn btn-secondary btn-lg flex-fill" disabled>
                                    <i class="fa fa-ban me-1"></i> Currently Out of Stock
                                </button>
                            @endif
                            <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#buyModal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">
                                Enquiry
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center mb-5 border-bottom pb-4">
                            <div class="col-md-6">
                                <h3 class="fw-bold mb-0">Customer Reviews</h3>
                            </div>
                            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                @php 
                                    $avgRating = $product->reviews->avg('rating') ?? 0;
                                    $totalReviews = $product->reviews->count();
                                @endphp
                                <div class="d-inline-flex align-items-center bg-light px-4 py-2 rounded-pill">
                                    <div class="text-warning fs-5 me-2">
                                        @for($i=1; $i<=5; $i++)
                                            <i class="{{ $i <= round($avgRating) ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                    </div>
                                    <h5 class="fw-bold mb-0 ms-2">{{ number_format($avgRating, 1) }} <span class="text-muted fs-6 fw-normal">out of 5 ({{ $totalReviews }} reviews)</span></h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-7 mb-5 mb-lg-0 pe-lg-5">
                                @if($totalReviews > 0)
                                    <div class="d-flex flex-column gap-4">
                                        @foreach($product->reviews as $review)
                                        <div class="p-4 bg-light rounded-4 border-0">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff&rounded=true" alt="{{ $review->name }}" width="45" height="45" class="rounded-circle shadow-sm">
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">{{ $review->name }}</h6>
                                                        <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                                    </div>
                                                </div>
                                                <div class="text-warning bg-white px-3 py-1 rounded-pill shadow-sm">
                                                    @for($i=1; $i<=5; $i++)
                                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star fs-6"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <p class="mb-0 text-dark" style="line-height: 1.6; font-size: 1.05rem;">{{ $review->comment }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-5 bg-light rounded-4 border-dashed">
                                        <i class="far fa-comment-dots fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">No reviews yet</h5>
                                        <p class="text-muted mb-0">Be the first to share your experience with this product!</p>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-lg-5">
                                <div class="p-4 p-md-5 rounded-4 shadow-sm" style="background: linear-gradient(145deg, #ffffff, #f8f9fa); border: 1px solid #eee;">
                                    <h4 class="fw-bold mb-4 text-primary">Write a Review</h4>
                                    <form id="reviewForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Your Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control form-control-lg bg-light border-0" required placeholder="John Doe">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Email Address <span class="text-muted fw-normal">(Optional)</span></label>
                                            <input type="email" name="email" class="form-control form-control-lg bg-light border-0" placeholder="john@example.com">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold text-dark d-block">Overall Rating <span class="text-danger">*</span></label>
                                            <div class="rating-stars text-warning fs-3" id="starSelector" style="cursor: pointer;">
                                                <i class="far fa-star" data-val="1"></i>
                                                <i class="far fa-star" data-val="2"></i>
                                                <i class="far fa-star" data-val="3"></i>
                                                <i class="far fa-star" data-val="4"></i>
                                                <i class="far fa-star" data-val="5"></i>
                                            </div>
                                            <input type="hidden" name="rating" id="ratingInput" value="0" required>
                                            <div class="invalid-feedback d-none" id="ratingError">Please select a rating.</div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold text-dark">Your Experience <span class="text-danger">*</span></label>
                                            <textarea name="comment" class="form-control form-control-lg bg-light border-0" rows="4" required placeholder="What did you like or dislike?"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm" id="submitReviewBtn">Post Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Similar / Related Products Section -->
        @if(isset($similarProducts) && $similarProducts->count() > 0)
        <div class="row mt-5 pt-3">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <span class="text-primary fw-bold text-uppercase small">Recommended For You</span>
                        <h3 class="fw-bold mb-0 text-dark">Similar Products</h3>
                    </div>
                    @if($product->category)
                        <a href="{{ route('products.category', $product->category->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill fw-semibold">
                            View All <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    @endif
                </div>

                <div class="row g-4">
                    @foreach($similarProducts as $simProd)
                        @include('frontend.products.partials.card', ['product' => $simProd, 'prefix' => 'sim_' . $simProd->id . '_'])
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Recently Interested Products Section -->
        @if(isset($recentlyViewedProducts) && $recentlyViewedProducts->count() > 0)
        <div class="row mt-5 pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <div>
                        <span class="text-primary fw-bold text-uppercase small">Recently Interested Products</span>
                        <h3 class="fw-bold mb-0 text-dark">Recently Viewed Products</h3>
                    </div>
                    <a href="{{ route('products.listing') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-semibold">
                        Browse More <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($recentlyViewedProducts->take(4) as $recentProd)
                        @include('frontend.products.partials.card', ['product' => $recentProd, 'prefix' => 'detail_rec_' . $recentProd->id . '_'])
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
</section>

<!-- Buy Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('products.inquiry') }}" method="POST">
        @csrf
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fw-bold">Product Enquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="product_id" id="modalProductId" value="{{ $product->id }}">
          <p class="mb-4">You are purchasing: <strong>{{ $product->name }}</strong></p>
          <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message / Address</label>
            <textarea name="message" class="form-control" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit Order</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- Include FontAwesome for the heart icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
$(document).ready(function() {
    $('#likeBtn').on('click', function(e) {
        e.preventDefault();
        var btn = $(this);
        var productId = btn.data('id');
        
        // Prevent double clicking
        if(btn.hasClass('disabled')) return;
        btn.addClass('disabled');

        $.ajax({
            url: "{{ url('/product') }}/" + productId + "/like",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(res) {
                if(res.success) {
                    $('#likesCount').text(res.likes);
                    if(res.hasLiked) {
                        btn.removeClass('btn-outline-danger').addClass('btn-danger text-white');
                        btn.find('i').removeClass('far').addClass('fas');
                    } else {
                        btn.removeClass('btn-danger text-white').addClass('btn-outline-danger');
                        btn.find('i').removeClass('fas').addClass('far');
                    }
                }
                btn.removeClass('disabled');
            },
            error: function() {
                btn.removeClass('disabled');
            }
        });
    });

    // Star rating interactive selector
    $('#starSelector i').on('mouseover', function() {
        var val = $(this).data('val');
        $('#starSelector i').each(function() {
            if($(this).data('val') <= val) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });
    });

    $('#starSelector').on('mouseout', function() {
        var selectedVal = $('#ratingInput').val();
        $('#starSelector i').each(function() {
            if($(this).data('val') <= selectedVal) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });
    });

    $('#starSelector i').on('click', function() {
        var val = $(this).data('val');
        $('#ratingInput').val(val);
        $('#ratingError').addClass('d-none');
    });

    $('#reviewForm').on('submit', function(e) {
        e.preventDefault();
        
        var rating = $('#ratingInput').val();
        if(rating == 0) {
            $('#ratingError').removeClass('d-none');
            return;
        }
        
        var btn = $('#submitReviewBtn');
        var form = $(this);
        
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Posting...');
        
        $.ajax({
            url: "{{ route('product.review', $product->id) }}",
            type: "POST",
            data: form.serialize(),
            success: function(res) {
                if(res.success) {
                    showCustomAlert('success', res.message, 'Review Submitted');
                    setTimeout(() => {
                        location.reload(); // Reload to show the new review
                    }, 1500);
                }
            },
            error: function(xhr) {
                var errorMsg = 'Error submitting review.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                showCustomAlert('error', errorMsg, 'Review Error');
                btn.prop('disabled', false).text('Post Review');
            }
        });
    });
});
</script>
@endpush
