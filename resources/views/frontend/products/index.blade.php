@extends('frontend.layouts.main')

@section('meta_title', isset($currentCategory) ? $currentCategory->name . ' Products | TC Smart Technology' : 'Products Catalog | TC Smart Technology - Industrial & Embedded Devices')
@section('meta_description', isset($currentCategory) ? 'Browse ' . $currentCategory->name . ' products from TC Smart Technology with real-time stock availability, detailed specs, and online ordering.' : 'Browse the complete product catalog at TC Smart Technology. Find high-grade embedded systems, industrial automation components, IoT sensors, and tools.')
@section('meta_keywords', (isset($currentCategory) ? $currentCategory->name . ', ' : '') . 'TC Smart Technology Products, Industrial Automation Products, Embedded Systems, Buy IoT Devices Online')

@section('content')
<style>
    .filter-card {
        border-radius: 1rem;
        background: #ffffff;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        border: 1px solid #edf2f7;
    }
    .filter-section-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #718096;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }
    .filter-checkbox-label {
        font-size: 0.92rem;
        color: #2d3748;
        cursor: pointer;
        user-select: none;
    }
    .filter-chip {
        display: inline-flex;
        align-items: center;
        background-color: #ebf8ff;
        color: #2b6cb0;
        border: 1px solid #bee3f8;
        border-radius: 50rem;
        padding: 0.3rem 0.8rem;
        font-size: 0.82rem;
        font-weight: 600;
        margin-right: 0.4rem;
        margin-bottom: 0.4rem;
    }
    .filter-chip .chip-remove {
        cursor: pointer;
        margin-left: 0.4rem;
        color: #2b6cb0;
        transition: color 0.15s ease;
    }
    .filter-chip .chip-remove:hover {
        color: #e53e3e;
    }
    .product-item-card {
        border-radius: 0.85rem;
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .product-item-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(0,0,0,0.08) !important;
    }

    /* Fast Loading Shimmer Skeleton Styles */
    .skeleton-box {
        background: #f1f3f5;
        background: linear-gradient(90deg, #f1f3f5 25%, #e2e8f0 37%, #f1f3f5 63%);
        background-size: 400% 100%;
        animation: skeleton-shimmer 1.4s ease infinite;
        border-radius: 6px;
    }
    @keyframes skeleton-shimmer {
        0% { background-position: 100% 50%; }
        100% { background-position: 0 50%; }
    }
    .skeleton-card {
        border-radius: 0.85rem;
        background: #ffffff;
        min-height: 460px;
    }
    .skeleton-card .skeleton-img {
        height: 200px;
        width: 100%;
        border-radius: 0.5rem;
    }
    .skeleton-card .skeleton-badge {
        height: 22px;
        width: 70px;
        border-radius: 50rem;
    }
    .skeleton-card .skeleton-title {
        height: 22px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
    .skeleton-card .skeleton-price {
        height: 24px;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
    .skeleton-card .skeleton-desc {
        height: 60px;
        width: 100%;
        border-radius: 0.35rem;
    }
    .skeleton-card .skeleton-buttons {
        height: 32px;
        width: 100%;
        border-radius: 0.35rem;
    }

    /* Responsive Mobile Filter Drawer */
    @media (max-width: 991.98px) {
        .filter-drawer-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1060;
            visibility: hidden;
            pointer-events: none;
            transition: visibility 0.3s ease;
        }
        .filter-drawer-wrapper.show {
            visibility: visible;
            pointer-events: auto;
        }
        .filter-drawer-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(2px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .filter-drawer-wrapper.show .filter-drawer-backdrop {
            opacity: 1;
        }
        .filter-drawer-panel {
            position: absolute;
            top: 0;
            left: 0;
            width: 85%;
            max-width: 380px;
            height: 100%;
            background: #ffffff;
            z-index: 2;
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.15);
        }
        .filter-drawer-wrapper.show .filter-drawer-panel {
            transform: translateX(0);
        }
        .filter-drawer-header {
            padding: 1.1rem 1.25rem;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
        }
        .filter-drawer-body {
            padding: 1.25rem;
            overflow-y: auto;
            flex: 1;
            -webkit-overflow-scrolling: touch;
        }
        .filter-drawer-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid #edf2f7;
            background: #ffffff;
            display: flex;
            gap: 0.75rem;
            box-shadow: 0 -4px 12px rgba(0,0,0,0.04);
        }
        .filter-card {
            box-shadow: none !important;
            border: none !important;
            padding: 0 !important;
        }
        .floating-filter-btn {
            position: fixed;
            bottom: 24px;
            right: 20px;
            left: auto;
            transform: translateY(100px);
            opacity: 0;
            pointer-events: none;
            z-index: 1040;
            box-shadow: 0 8px 24px rgba(223, 155, 21, 0.35);
            border-radius: 50rem;
            padding: 0.65rem 1.3rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), opacity 0.3s ease, box-shadow 0.2s ease;
        }
        .floating-filter-btn.visible {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
        .floating-filter-btn:active {
            transform: translateY(0) scale(0.96);
        }
    }

    @media (min-width: 992px) {
        .filter-drawer-wrapper {
            position: static !important;
            visibility: visible !important;
            pointer-events: auto !important;
            width: auto !important;
            height: auto !important;
            z-index: auto !important;
        }
        .filter-drawer-backdrop {
            display: none !important;
        }
        .filter-drawer-panel {
            position: static !important;
            transform: none !important;
            width: 100% !important;
            max-width: none !important;
            height: auto !important;
            box-shadow: none !important;
            display: block !important;
            background: transparent !important;
        }
        .filter-drawer-header {
            display: none !important;
        }
        .filter-drawer-body {
            padding: 0 !important;
            overflow: visible !important;
        }
        .filter-drawer-footer {
            display: none !important;
        }
        .floating-filter-btn {
            display: none !important;
        }
    }

    @media (max-width: 575.98px) {
        .page-title {
            padding: 2rem 0 !important;
        }
        .page-title h1 {
            font-size: 1.45rem !important;
        }
        .page-title p {
            font-size: 0.8rem !important;
        }
    }
</style>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our Products Catalog</span>
          <h1 class="text-capitalize mb-3 text-lg">
            {{ isset($currentCategory) ? $currentCategory->name . ' Products' : 'All Products & Categories' }}
          </h1>
          <p class="text-white-50 mb-0">Select multiple categories and subcategories / models below to filter</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section py-3 py-lg-5">
    <div class="container">
        <div class="row">

            <!-- FILTER SIDEBAR (Desktop Sidebar & Mobile Offcanvas Drawer) -->
            <div class="col-lg-3">
                <div class="filter-drawer-wrapper" id="filterDrawerWrapper">
                    <div class="filter-drawer-backdrop" onclick="closeMobileFilters()"></div>
                    <div class="filter-drawer-panel">

                        <!-- Mobile Drawer Header (Visible on Mobile only) -->
                        <div class="filter-drawer-header">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sliders-h text-primary me-2"></i>
                                <h6 class="fw-bold mb-0 text-dark">Filter Products</h6>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <button type="button" class="btn btn-link text-danger p-0 text-decoration-none small fw-semibold" onclick="resetAllFilters()">
                                    Reset All
                                </button>
                                <button type="button" class="btn-close" aria-label="Close" onclick="closeMobileFilters()"></button>
                            </div>
                        </div>

                        <!-- Filter Body (Card on Desktop, Scrollable in Mobile Drawer) -->
                        <div class="filter-drawer-body">
                            <div class="filter-card p-3 p-lg-4 sticky-top" style="top: 100px; z-index: 10;">
                                <div class="d-none d-lg-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                    <h5 class="fw-bold mb-0 text-dark">
                                        <i class="fa fa-sliders-h text-primary me-2"></i> Filters
                                    </h5>
                                    <button type="button" class="btn btn-link text-danger p-0 text-decoration-none small fw-semibold" onclick="resetAllFilters()">
                                        Reset All
                                    </button>
                                </div>

                                <!-- SEARCH FILTER -->
                                <div class="mb-4">
                                    <div class="filter-section-title">Search Products</div>
                                    <div class="input-group">
                                        <input type="text" id="productSearchInput" class="form-control form-control-sm" placeholder="Search by name..." oninput="handleFilterChange()">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="document.getElementById('productSearchInput').value=''; handleFilterChange();">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- MULTI-SELECT CATEGORIES -->
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="filter-section-title mb-0">Categories</div>
                                        <span class="badge bg-light text-muted border small">{{ count($allCategories) }}</span>
                                    </div>
                                    <div class="filter-options-list" style="max-height: 220px; overflow-y: auto;">
                                        @foreach($allCategories as $cat)
                                            @php
                                                $catProductCount = $cat->products_count ?? 0;
                                                $isCatChecked = in_array($cat->slug, $selectedCategorySlugs ?? []);
                                            @endphp
                                            <div class="form-check mb-2">
                                                <input class="form-check-input filter-category-checkbox" 
                                                       type="checkbox" 
                                                       value="{{ $cat->id }}" 
                                                       data-slug="{{ $cat->slug }}" 
                                                       data-name="{{ $cat->name }}"
                                                       id="filter_cat_{{ $cat->id }}"
                                                       {{ $isCatChecked ? 'checked' : '' }}
                                                       onchange="handleFilterChange()">
                                                <label class="form-check-label filter-checkbox-label d-flex justify-content-between align-items-center w-100" for="filter_cat_{{ $cat->id }}">
                                                    <span>{{ $cat->name }}</span>
                                                    <span class="badge bg-light text-muted border rounded-pill small">{{ $catProductCount }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="my-3 text-muted">

                                <!-- MULTI-SELECT SUBCATEGORIES / MODELS -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="filter-section-title mb-0">Subcategory / Model</div>
                                        <span class="badge bg-light text-muted border small">{{ count($allModels) }}</span>
                                    </div>
                                    <div class="filter-options-list" style="max-height: 240px; overflow-y: auto;">
                                        @foreach($allModels as $model)
                                            @php
                                                $modelProductCount = $model->products_count ?? 0;
                                                $isModelChecked = in_array($model->slug, $selectedModelSlugs ?? []);
                                            @endphp
                                            <div class="form-check mb-2 filter-model-item" data-category-id="{{ $model->category_id }}">
                                                <input class="form-check-input filter-model-checkbox" 
                                                       type="checkbox" 
                                                       value="{{ $model->id }}" 
                                                       data-category-id="{{ $model->category_id }}" 
                                                       data-slug="{{ $model->slug }}" 
                                                       data-name="{{ $model->name }}"
                                                       id="filter_model_{{ $model->id }}"
                                                       {{ $isModelChecked ? 'checked' : '' }}
                                                       onchange="handleFilterChange()">
                                                <label class="form-check-label filter-checkbox-label d-flex justify-content-between align-items-center w-100" for="filter_model_{{ $model->id }}">
                                                    <span>
                                                        {{ $model->name }}
                                                        @if($model->category)
                                                            <small class="text-muted d-block" style="font-size: 0.72rem;">({{ $model->category->name }})</small>
                                                        @endif
                                                    </span>
                                                    <span class="badge bg-light text-muted border rounded-pill small">{{ $modelProductCount }}</span>
                                                </label>
                                            </div>
                                        @endforeach

                                        @if(count($allModels) == 0)
                                            <p class="text-muted small mb-0">No subcategories available.</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Mobile Drawer Footer (Sticky Apply / Reset Bar) -->
                        <div class="filter-drawer-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm flex-fill py-2" onclick="resetAllFilters()">
                                Reset All
                            </button>
                            <button type="button" class="btn btn-primary btn-sm flex-fill fw-bold py-2 shadow-sm" onclick="closeMobileFilters()">
                                <span id="applyFilterBtnText">View Products</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- MAIN PRODUCT CATALOG AREA -->
            <div class="col-lg-9 col-12">

                <!-- Recently Interested Products SECTION (Shown first if session has viewed products) -->
                @if(isset($recentlyViewedProducts) && $recentlyViewedProducts->count() > 0)
                <div class="card border-0 shadow-sm p-3 mb-4 rounded-3 bg-white" style="border-left: 4px solid var(--bs-primary, #df9b15) !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                                <i class="fa fa-history text-primary"></i> Recently Viewed Products
                            </h6>
                            <small class="text-muted">Recently Interested Products you explored</small>
                        </div>
                        <span class="badge bg-light text-primary border fw-semibold">{{ $recentlyViewedProducts->count() }} items</span>
                    </div>
                    <div class="row g-3">
                        @foreach($recentlyViewedProducts->take(4) as $recentProd)
                            @include('frontend.products.partials.card', [
                                'product' => $recentProd,
                                'colClass' => 'col-lg-3 col-md-6 col-6 mb-2',
                                'prefix' => 'recent_' . $recentProd->id . '_'
                            ])
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- TOP CONTROLS & ACTIVE CHIPS BAR -->
                <div class="card border-0 shadow-sm p-2 p-md-3 mb-3 mb-md-4 rounded-3 bg-light">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center">
                            <span class="text-muted small">Showing </span>
                            <span id="productsCountDisplay" class="fw-bold text-dark fs-6 fs-md-5 mx-1">0</span>
                            <span class="text-muted small"> products</span>
                        </div>

                        <!-- Mobile Filter Button & Sort Select in Same Responsive Row -->
                        <div class="d-flex align-items-center gap-2 ms-auto">
                            <!-- Mobile Filter Button (Visible on screens < 992px) -->
                            <button type="button" id="topMobileFilterBtn" class="btn btn-outline-primary btn-sm d-lg-none fw-semibold shadow-2xs px-2 px-sm-3 py-1" onclick="openMobileFilters()">
                                <i class="fa fa-sliders-h me-1"></i> Filters
                                <span class="badge bg-primary text-white rounded-pill ms-1 mobile-filter-count-badge d-none">0</span>
                            </button>

                            <!-- SORT DROPDOWN -->
                            <div class="d-flex align-items-center gap-1">
                                <label class="small text-muted text-nowrap fw-semibold mb-0 d-none d-sm-inline" for="productSortSelect">Sort By:</label>
                                <select id="productSortSelect" class="form-select form-select-sm py-1 ps-2 pe-4" style="width: auto; min-width: 125px; font-size: 0.82rem;" onchange="handleSortChange()">
                                    <option value="default">Default</option>
                                    <option value="price_asc">Price: Low to High</option>
                                    <option value="price_desc">Price: High to Low</option>
                                    <option value="name_asc">Name: A to Z</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIVE FILTER PILLS / CHIPS -->
                    <div id="activeFilterChipsContainer" class="mt-2 pt-2 border-top d-none">
                        <div class="d-flex align-items-center flex-wrap">
                            <span class="small text-muted me-2 fw-semibold">Active:</span>
                            <div id="activeFilterChipsList" class="d-inline-flex flex-wrap align-items-center"></div>
                            <button type="button" class="btn btn-sm btn-link text-danger p-0 ms-2 text-decoration-none small" onclick="resetAllFilters()">Clear All</button>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS GRID CONTAINER -->
                <div class="row" id="productsGridContainer">

                    <!-- SKELETON PLACEHOLDER LOADING GRID (Displayed on initial load & during filter fetching) -->
                    <div id="productsSkeletonContainer" class="row w-100 m-0 p-0">
                        @for($i = 0; $i < 6; $i++)
                            <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
                                <div class="card w-100 shadow-sm border-0 skeleton-card p-3 d-flex flex-column">
                                    <div class="skeleton-box skeleton-img mb-3"></div>
                                    <div class="d-flex justify-content-center gap-2 mb-2">
                                        <div class="skeleton-box skeleton-badge"></div>
                                        <div class="skeleton-box skeleton-badge"></div>
                                    </div>
                                    <div class="skeleton-box skeleton-title mb-2"></div>
                                    <div class="skeleton-box skeleton-price mb-3"></div>
                                    <div class="skeleton-box skeleton-desc mb-3"></div>
                                    <div class="skeleton-box skeleton-buttons mt-auto"></div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <!-- DYNAMIC PRODUCT CARDS LIST (Populated via jQuery AJAX) -->
                    <div id="productsGridItems" class="row w-100 m-0 p-0"></div>

                    <!-- NO PRODUCTS FOUND EMPTY STATE (Shown dynamically via JS when filters yield 0 items) -->
                    <div id="noProductsState" class="col-12 text-center py-5 d-none">
                        <div class="p-5 bg-light rounded-4 border">
                            <i class="fa fa-search fa-3x text-muted mb-3 d-block opacity-50"></i>
                            <h4 class="fw-bold text-dark mb-2">No Matching Products Found</h4>
                            <p class="text-muted mb-4">No products match the selected categories and subcategories.</p>
                            <button type="button" class="btn btn-primary px-4 py-2" onclick="resetAllFilters()">
                                <i class="fa fa-redo me-1"></i> Reset All Filters
                            </button>
                        </div>
                    </div>

                    <!-- LOAD MORE & INFINITE SCROLL CONTAINER -->
                    <div id="loadMoreContainer" class="col-12 text-center py-4 d-none">
                        <div class="d-inline-flex flex-column align-items-center">
                            <p class="text-muted small mb-2" id="loadMoreStatusText">Showing 0 of 0 products</p>
                            <button type="button" id="loadMoreBtn" class="btn btn-primary px-4 py-2 shadow-sm rounded-pill fw-semibold" onclick="loadMoreProducts()">
                                <span class="spinner-border spinner-border-sm me-2 d-none" id="loadMoreSpinner" role="status" aria-hidden="true"></span>
                                <span>Load More Products</span>
                            </button>
                        </div>
                    </div>

                    <!-- SENTINEL FOR AUTO INFINITE SCROLL -->
                    <div id="infiniteScrollSentinel" style="height: 20px; width: 100%;"></div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- FLOATING MOBILE FILTER BUTTON -->
<button type="button" id="floatingMobileFilterBtn" class="btn btn-primary floating-filter-btn d-lg-none shadow-lg" onclick="openMobileFilters()">
    <i class="fa fa-sliders-h"></i>
    <span>Filters</span>
    <span class="badge bg-white text-primary rounded-pill mobile-filter-count-badge d-none">0</span>
</button>

<!-- Buy / Enquiry Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('products.inquiry') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="buyModalLabel">Product Enquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="product_id" id="modalProductId">
          <p>Product: <strong id="modalProductName"></strong></p>
          <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label>Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Message / Address</label>
            <textarea name="message" class="form-control" rows="3"></textarea>
          </div>
          <div class="form-check mb-3 text-start">
            <input class="form-check-input" type="checkbox" name="agree_terms" id="indexInquiryTerms" required checked>
            <label class="form-check-label small text-secondary" for="indexInquiryTerms">
              I agree to the <a href="{{ route('terms.conditions') }}" target="_blank" class="text-primary text-decoration-underline fw-semibold">Terms &amp; Conditions</a>. <span class="text-danger">*</span>
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit Enquiry</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    // Enquiry Modal Setup
    var buyModal = document.getElementById('buyModal');
    if (buyModal) {
        buyModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var productId = button.getAttribute('data-product-id');
            var productName = button.getAttribute('data-product-name');
            
            var modalProductId = buyModal.querySelector('#modalProductId');
            var modalProductName = buyModal.querySelector('#modalProductName');
            
            modalProductId.value = productId;
            modalProductName.textContent = productName;
        });
    }

    // Global Product Catalog AJAX Engine
    const PRODUCTS_PER_PAGE = 20;
    const PRODUCTS_AJAX_URL = "{{ route('products.listing') }}";
    
    let currentPage = 1;
    let hasMorePages = false;
    let totalProducts = 0;
    let loadedProductsCount = 0;
    let isLoading = false;
    let activeAjaxRequest = null;
    let searchDebounceTimer = null;

    function handleFilterChange() {
        if (activeAjaxRequest) {
            activeAjaxRequest.abort();
        }
        loadProducts(1, false);
    }

    function handleSortChange() {
        if (activeAjaxRequest) {
            activeAjaxRequest.abort();
        }
        loadProducts(1, false);
    }

    // Compatibility aliases to prevent ReferenceError from cached scripts/calls
    window.applyFilters = function() {
        handleFilterChange();
    };
    window.applySorting = function() {
        handleSortChange();
    };

    function loadMoreProducts() {
        if (isLoading || !hasMorePages) return;
        loadProducts(currentPage + 1, true);
    }

    function getSelectedFilters() {
        var selectedCatSlugs = [];
        var selectedCatNames = {};
        $('.filter-category-checkbox:checked').each(function() {
            var slug = $(this).attr('data-slug');
            if (slug) {
                selectedCatSlugs.push(slug);
                selectedCatNames[slug] = $(this).attr('data-name');
            }
        });

        var selectedModelSlugs = [];
        var selectedModelNames = {};
        $('.filter-model-checkbox:checked').each(function() {
            var slug = $(this).attr('data-slug');
            if (slug) {
                selectedModelSlugs.push(slug);
                selectedModelNames[slug] = $(this).attr('data-name');
            }
        });

        var searchQuery = ($.trim($('#productSearchInput').val()) || '').toLowerCase();
        var sortVal = $('#productSortSelect').val() || 'default';

        return {
            categories: selectedCatSlugs,
            categoryNames: selectedCatNames,
            models: selectedModelSlugs,
            modelNames: selectedModelNames,
            search: searchQuery,
            sort: sortVal
        };
    }

    function loadProducts(page, isAppend) {
        if (isLoading && isAppend) return;

        var filters = getSelectedFilters();

        // Update URL query parameters seamlessly without page reload
        updateUrlParams(filters.categories, filters.models, filters.search, filters.sort);

        // Update active filter pills/chips and mobile counters
        renderActiveChips(filters.categories, filters.categoryNames, filters.models, filters.modelNames, filters.search);
        updateFilterBadgeCounts(filters.categories.length + filters.models.length + (filters.search ? 1 : 0));

        if (!isAppend) {
            isLoading = true;
            $('#productsSkeletonContainer').removeClass('d-none');
            $('#productsGridItems').html('');
            $('#noProductsState').addClass('d-none');
            $('#loadMoreContainer').addClass('d-none');
            currentPage = 1;
            loadedProductsCount = 0;
        } else {
            isLoading = true;
            $('#loadMoreSpinner').removeClass('d-none');
            $('#loadMoreBtn').prop('disabled', true);
        }

        activeAjaxRequest = $.ajax({
            url: PRODUCTS_AJAX_URL,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            data: {
                categories: filters.categories.join(','),
                models: filters.models.join(','),
                search: filters.search,
                sort: filters.sort,
                page: page
            },
            success: function(response) {
                $('#productsSkeletonContainer').addClass('d-none');
                currentPage = response.current_page || page;
                hasMorePages = !!response.has_more;
                totalProducts = response.total || 0;
                var html = response.html ? response.html.trim() : '';

                if (isAppend) {
                    $('#productsGridItems').append(html);
                    loadedProductsCount += (response.count || 0);
                } else {
                    if (totalProducts === 0 || !html) {
                        $('#productsGridItems').html('');
                        $('#noProductsState').removeClass('d-none');
                        $('#loadMoreContainer').addClass('d-none');
                        loadedProductsCount = 0;
                    } else {
                        $('#productsGridItems').html(html);
                        $('#noProductsState').addClass('d-none');
                        loadedProductsCount = (response.count || 0);
                    }
                }

                // Update items counter
                $('#productsCountDisplay').text(totalProducts);
                $('#applyFilterBtnText').text('View ' + totalProducts + ' Product' + (totalProducts === 1 ? '' : 's'));

                // Update Load More UI
                updateLoadMoreUI();
            },
            error: function(xhr, status, error) {
                if (status === 'abort') return;
                $('#productsSkeletonContainer').addClass('d-none');
                console.error('AJAX products error:', error);
            },
            complete: function() {
                isLoading = false;
                $('#loadMoreSpinner').addClass('d-none');
                $('#loadMoreBtn').prop('disabled', false);
            }
        });
    }

    function updateLoadMoreUI() {
        var $container = $('#loadMoreContainer');
        var $status = $('#loadMoreStatusText');
        var $btn = $('#loadMoreBtn');

        if (totalProducts === 0) {
            $container.addClass('d-none');
            return;
        }

        if (hasMorePages) {
            $container.removeClass('d-none');
            $btn.removeClass('d-none');
            $status.text('Showing ' + loadedProductsCount + ' of ' + totalProducts + ' products');
        } else if (totalProducts > PRODUCTS_PER_PAGE) {
            $container.removeClass('d-none');
            $btn.addClass('d-none');
            $status.text('All ' + totalProducts + ' products loaded');
        } else {
            $container.addClass('d-none');
        }
    }

    function updateFilterBadgeCounts(count) {
        var $badges = $('.mobile-filter-count-badge');
        $badges.text(count);
        if (count > 0) {
            $badges.removeClass('d-none');
        } else {
            $badges.addClass('d-none');
        }
    }



    function renderActiveChips(catSlugs, catNames, modelSlugs, modelNames, searchQuery) {
        var $container = $('#activeFilterChipsContainer');
        var $list = $('#activeFilterChipsList');
        var chipsHtml = '';

        catSlugs.forEach(function(slug) {
            chipsHtml += '<span class="filter-chip">' +
                'Category: ' + (catNames[slug] || slug) +
                '<span class="chip-remove" onclick="uncheckCategory(\'' + slug + '\')">&times;</span>' +
            '</span>';
        });

        modelSlugs.forEach(function(slug) {
            chipsHtml += '<span class="filter-chip">' +
                'Model: ' + (modelNames[slug] || slug) +
                '<span class="chip-remove" onclick="uncheckModel(\'' + slug + '\')">&times;</span>' +
            '</span>';
        });

        if (searchQuery) {
            chipsHtml += '<span class="filter-chip">' +
                'Search: "' + $('<div>').text(searchQuery).html() + '"' +
                '<span class="chip-remove" onclick="clearSearch()">&times;</span>' +
            '</span>';
        }

        $list.html(chipsHtml);

        if (catSlugs.length > 0 || modelSlugs.length > 0 || searchQuery) {
            $container.removeClass('d-none');
        } else {
            $container.addClass('d-none');
        }
    }

    function uncheckCategory(slug) {
        $('.filter-category-checkbox[data-slug="' + slug + '"]').prop('checked', false);
        handleFilterChange();
    }

    function uncheckModel(slug) {
        $('.filter-model-checkbox[data-slug="' + slug + '"]').prop('checked', false);
        handleFilterChange();
    }

    function clearSearch() {
        $('#productSearchInput').val('');
        handleFilterChange();
    }

    function resetAllFilters() {
        $('.filter-category-checkbox').prop('checked', false);
        $('.filter-model-checkbox').prop('checked', false);
        $('#productSearchInput').val('');
        $('#productSortSelect').val('default');
        handleFilterChange();
    }

    function updateUrlParams(catSlugs, modelSlugs, searchQuery, sortVal) {
        if (!history.replaceState) return;

        var url = new URL(window.location.href);

        if (catSlugs && catSlugs.length > 0) {
            url.searchParams.set('categories', catSlugs.join(','));
        } else {
            url.searchParams.delete('categories');
        }

        if (modelSlugs && modelSlugs.length > 0) {
            url.searchParams.set('models', modelSlugs.join(','));
        } else {
            url.searchParams.delete('models');
        }

        if (searchQuery) {
            url.searchParams.set('search', searchQuery);
        } else {
            url.searchParams.delete('search');
        }

        if (sortVal && sortVal !== 'default') {
            url.searchParams.set('sort', sortVal);
        } else {
            url.searchParams.delete('sort');
        }

        // Clean page parameter when filter changes
        url.searchParams.delete('page');

        history.replaceState(null, null, url.toString());
    }

    // Mobile Drawer Open / Close Functions
    function openMobileFilters() {
        var wrapper = document.getElementById('filterDrawerWrapper');
        if (wrapper) {
            wrapper.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeMobileFilters() {
        var wrapper = document.getElementById('filterDrawerWrapper');
        if (wrapper) {
            wrapper.classList.remove('show');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeMobileFilters();
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            closeMobileFilters();
        }
    });

    // jQuery Document Ready Initialization
    $(function() {
        // Debounced search input handler
        $('#productSearchInput').on('input', function() {
            clearTimeout(searchDebounceTimer);
            searchDebounceTimer = setTimeout(function() {
                handleFilterChange();
            }, 300);
        });

        // Initial AJAX load of products into the catalog
        loadProducts(1, false);

        // Auto infinite scroll when scrolling to bottom sentinel
        var sentinel = document.getElementById('infiniteScrollSentinel');
        if (sentinel && 'IntersectionObserver' in window) {
            var scrollObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting && hasMorePages && !isLoading) {
                        loadMoreProducts();
                    }
                });
            }, {
                root: null,
                rootMargin: '250px',
                threshold: 0
            });
            scrollObserver.observe(sentinel);
        }

        // Show floating filter button on the side ONLY when the top toggle button is scrolled out of view
        var topFilterBtn = document.getElementById('topMobileFilterBtn');
        var floatingFilterBtn = document.getElementById('floatingMobileFilterBtn');

        if (topFilterBtn && floatingFilterBtn) {
            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            // Top toggle is visible -> hide side floating button
                            floatingFilterBtn.classList.remove('visible');
                        } else {
                            // Top toggle is scrolled past / hidden -> show side floating button
                            floatingFilterBtn.classList.add('visible');
                        }
                    });
                }, { threshold: 0 });
                observer.observe(topFilterBtn);
            } else {
                window.addEventListener('scroll', function() {
                    var rect = topFilterBtn.getBoundingClientRect();
                    if (rect.bottom < 0) {
                        floatingFilterBtn.classList.add('visible');
                    } else {
                        floatingFilterBtn.classList.remove('visible');
                    }
                }, { passive: true });
            }
        }
    });
</script>
@endpush
