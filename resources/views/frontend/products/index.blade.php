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

            <!-- MOBILE FILTER TOGGLE BUTTON -->
            <div class="col-12 d-lg-none mb-3">
                <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center py-2" type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilterCollapse" aria-expanded="false">
                    <span><i class="fa fa-filter me-2"></i> Filter Products (Categories & Models)</span>
                    <i class="fa fa-chevron-down"></i>
                </button>
            </div>

            <!-- FILTER SIDEBAR -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="collapse d-lg-block" id="mobileFilterCollapse">
                    <div class="filter-card p-4 sticky-top" style="top: 100px; z-index: 10;">
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
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
            </div>

            <!-- MAIN PRODUCT CATALOG AREA -->
            <div class="col-lg-9 col-md-8">
                
                <!-- TOP CONTROLS & ACTIVE CHIPS BAR -->
                <div class="card border-0 shadow-sm p-3 mb-4 rounded-3 bg-light">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <span class="text-muted">Showing </span>
                            <span id="productsCountDisplay" class="fw-bold text-dark fs-5">0</span>
                            <span class="text-muted"> products</span>
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

    // Initialize filters on page load
    document.addEventListener("DOMContentLoaded", function () {
        applyFilters();
    });
</script>
@endpush
