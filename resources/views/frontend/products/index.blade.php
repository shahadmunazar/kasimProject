@extends('frontend.layouts.main')

@section('meta_title', isset($currentCategory) ? $currentCategory->name . ' Products' : 'Products Catalog')

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
            box-shadow: 0 8px 24px rgba(13, 110, 253, 0.35);
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

<section class="section py-5">
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
                                                $catProductCount = $allProducts->where('category_id', $cat->id)->count();
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
                                                $modelProductCount = $allProducts->where('product_model_id', $model->id)->count();
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
                
                <!-- TOP CONTROLS & ACTIVE CHIPS BAR -->
                <div class="card border-0 shadow-sm p-3 mb-4 rounded-3 bg-light">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div class="d-flex align-items-center justify-content-between w-100 w-md-auto">
                            <div>
                                <span class="text-muted">Showing </span>
                                <span id="productsCountDisplay" class="fw-bold text-dark fs-5">0</span>
                                <span class="text-muted"> products</span>
                            </div>

                            <!-- Mobile Filter Button in Top Bar -->
                            <button type="button" id="topMobileFilterBtn" class="btn btn-outline-primary btn-sm d-lg-none fw-semibold shadow-sm px-3 py-2" onclick="openMobileFilters()">
                                <i class="fa fa-sliders-h me-1"></i> Filters
                                <span class="badge bg-primary text-white rounded-pill ms-1 mobile-filter-count-badge d-none">0</span>
                            </button>
                        </div>

                        <!-- SORT DROPDOWN -->
                        <div class="d-flex align-items-center gap-2">
                            <label class="small text-muted text-nowrap fw-semibold mb-0">Sort By:</label>
                            <select id="productSortSelect" class="form-select form-select-sm" style="min-width: 170px;" onchange="handleSortChange()">
                                <option value="default">Default</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                                <option value="name_asc">Name: A to Z</option>
                            </select>
                        </div>
                    </div>

                    <!-- ACTIVE FILTER PILLS / CHIPS -->
                    <div id="activeFilterChipsContainer" class="mt-3 pt-2 border-top d-none">
                        <div class="d-flex align-items-center flex-wrap">
                            <span class="small text-muted me-2 fw-semibold">Active:</span>
                            <div id="activeFilterChipsList" class="d-inline-flex flex-wrap align-items-center"></div>
                            <button type="button" class="btn btn-sm btn-link text-danger p-0 ms-2 text-decoration-none small" onclick="resetAllFilters()">Clear All</button>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS GRID CONTAINER -->
                <div class="row" id="productsGridContainer">
                    @forelse($allProducts as $product)
                        @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'p_' . $product->id . '_'])
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                            <h4 class="text-muted">No products available in the catalog.</h4>
                        </div>
                    @endforelse

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

    // Interactive Filtering Engine
    function handleFilterChange() {
        applyFilters();
    }

    function handleSortChange() {
        applySorting();
    }

    function applyFilters() {
        // Collect selected categories
        var selectedCatSlugs = [];
        var selectedCatNames = {};
        document.querySelectorAll('.filter-category-checkbox:checked').forEach(function(cb) {
            var slug = cb.getAttribute('data-slug');
            selectedCatSlugs.push(slug);
            selectedCatNames[slug] = cb.getAttribute('data-name');
        });

        // Collect selected models / subcategories
        var selectedModelSlugs = [];
        var selectedModelNames = {};
        document.querySelectorAll('.filter-model-checkbox:checked').forEach(function(cb) {
            var slug = cb.getAttribute('data-slug');
            selectedModelSlugs.push(slug);
            selectedModelNames[slug] = cb.getAttribute('data-name');
        });

        var searchQuery = (document.getElementById('productSearchInput').value || '').trim().toLowerCase();

        var productItems = document.querySelectorAll('.product-card-wrapper');
        var visibleCount = 0;

        productItems.forEach(function(item) {
            var itemCatSlug = item.getAttribute('data-category-slug');
            var itemModelSlug = item.getAttribute('data-model-slug');
            var itemName = (item.getAttribute('data-name') || '').toLowerCase();

            // Match Category: if no category is checked, match all. Else must be in selected categories.
            var matchCategory = selectedCatSlugs.length === 0 || selectedCatSlugs.includes(itemCatSlug);

            // Match Model: if no model is checked, match all. Else must be in selected models.
            var matchModel = selectedModelSlugs.length === 0 || (itemModelSlug && selectedModelSlugs.includes(itemModelSlug));

            // Match Search
            var matchSearch = !searchQuery || itemName.indexOf(searchQuery) !== -1;

            if (matchCategory && matchModel && matchSearch) {
                item.classList.remove('d-none');
                item.classList.add('d-flex');
                visibleCount++;
            } else {
                item.classList.add('d-none');
                item.classList.remove('d-flex');
            }
        });

        // Update count display
        var countEl = document.getElementById('productsCountDisplay');
        if (countEl) countEl.innerText = visibleCount;

        // Update mobile filter badges & drawer button text
        var activeCount = selectedCatSlugs.length + selectedModelSlugs.length + (searchQuery ? 1 : 0);
        document.querySelectorAll('.mobile-filter-count-badge').forEach(function(badge) {
            badge.textContent = activeCount;
            if (activeCount > 0) {
                badge.classList.remove('d-none');
            } else {
                badge.classList.add('d-none');
            }
        });

        var applyBtnText = document.getElementById('applyFilterBtnText');
        if (applyBtnText) {
            applyBtnText.textContent = `View ${visibleCount} Product${visibleCount === 1 ? '' : 's'}`;
        }

        // Show/hide empty state message
        var emptyState = document.getElementById('noProductsState');
        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('d-none');
            } else {
                emptyState.classList.add('d-none');
            }
        }

        // Render Active Filter Chips
        renderActiveChips(selectedCatSlugs, selectedCatNames, selectedModelSlugs, selectedModelNames, searchQuery);

        // Update browser URL query params without reloading
        updateUrlParams(selectedCatSlugs, selectedModelSlugs);
    }

    function renderActiveChips(catSlugs, catNames, modelSlugs, modelNames, searchQuery) {
        var container = document.getElementById('activeFilterChipsContainer');
        var list = document.getElementById('activeFilterChipsList');
        if (!container || !list) return;

        var chipsHtml = '';

        catSlugs.forEach(function(slug) {
            chipsHtml += `<span class="filter-chip">
                Category: ${catNames[slug] || slug}
                <span class="chip-remove" onclick="uncheckCategory('${slug}')">&times;</span>
            </span>`;
        });

        modelSlugs.forEach(function(slug) {
            chipsHtml += `<span class="filter-chip">
                Model: ${modelNames[slug] || slug}
                <span class="chip-remove" onclick="uncheckModel('${slug}')">&times;</span>
            </span>`;
        });

        if (searchQuery) {
            chipsHtml += `<span class="filter-chip">
                Search: "${searchQuery}"
                <span class="chip-remove" onclick="clearSearch()">&times;</span>
            </span>`;
        }

        list.innerHTML = chipsHtml;

        if (catSlugs.length > 0 || modelSlugs.length > 0 || searchQuery) {
            container.classList.remove('d-none');
        } else {
            container.classList.add('d-none');
        }
    }

    function uncheckCategory(slug) {
        var cb = document.querySelector(`.filter-category-checkbox[data-slug="${slug}"]`);
        if (cb) {
            cb.checked = false;
            applyFilters();
        }
    }

    function uncheckModel(slug) {
        var cb = document.querySelector(`.filter-model-checkbox[data-slug="${slug}"]`);
        if (cb) {
            cb.checked = false;
            applyFilters();
        }
    }

    function clearSearch() {
        var input = document.getElementById('productSearchInput');
        if (input) {
            input.value = '';
            applyFilters();
        }
    }

    function resetAllFilters() {
        document.querySelectorAll('.filter-category-checkbox').forEach(function(cb) {
            cb.checked = false;
        });
        document.querySelectorAll('.filter-model-checkbox').forEach(function(cb) {
            cb.checked = false;
        });
        var searchInput = document.getElementById('productSearchInput');
        if (searchInput) searchInput.value = '';

        var sortSelect = document.getElementById('productSortSelect');
        if (sortSelect) sortSelect.value = 'default';

        applyFilters();
    }

    function updateUrlParams(catSlugs, modelSlugs) {
        if (!history.replaceState) return;

        var url = new URL(window.location.href);
        if (catSlugs.length > 0) {
            url.searchParams.set('categories', catSlugs.join(','));
        } else {
            url.searchParams.delete('categories');
        }

        if (modelSlugs.length > 0) {
            url.searchParams.set('models', modelSlugs.join(','));
        } else {
            url.searchParams.delete('models');
        }

        history.replaceState(null, null, url.toString());
    }

    function applySorting() {
        var sortVal = document.getElementById('productSortSelect').value;
        var container = document.getElementById('productsGridContainer');
        var items = Array.from(container.querySelectorAll('.product-card-wrapper'));

        items.sort(function(a, b) {
            var priceA = parseFloat(a.getAttribute('data-price') || 0);
            var priceB = parseFloat(b.getAttribute('data-price') || 0);
            var nameA = (a.getAttribute('data-name') || '').toLowerCase();
            var nameB = (b.getAttribute('data-name') || '').toLowerCase();

            if (sortVal === 'price_asc') {
                return priceA - priceB;
            } else if (sortVal === 'price_desc') {
                return priceB - priceA;
            } else if (sortVal === 'name_asc') {
                return nameA.localeCompare(nameB);
            }
            return 0;
        });

        // Re-append sorted items before the empty state container
        var emptyState = document.getElementById('noProductsState');
        items.forEach(function(item) {
            container.insertBefore(item, emptyState);
        });
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

    // Initialize filters on page load
    document.addEventListener("DOMContentLoaded", function () {
        applyFilters();

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
