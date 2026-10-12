@extends('frontend.layouts.main')

@section('meta_title', isset($category) ? $category->name . ' Products' : 'Products')

@section('content')
<style>
    .product-filter-nav {
        gap: 8px;
        padding: 6px;
        background: #f8f9fa;
        border-radius: 50px;
        display: inline-flex;
        max-width: 100%;
        overflow-x: auto;
        border: 1px solid #e9ecef;
    }
    .product-filter-nav .nav-link {
        color: #495057;
        background-color: transparent;
        border: none;
        border-radius: 50rem;
        padding: 0.6rem 1.4rem;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.25s ease;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
    }
    .product-filter-nav .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.08);
        color: #0d6efd;
    }
    .product-filter-nav .nav-link.active {
        background-color: #0d6efd;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }
    .product-filter-nav .nav-link .badge {
        margin-left: 0.5rem;
        font-size: 0.75rem;
        padding: 0.3em 0.6em;
        border-radius: 50rem;
        transition: all 0.2s ease;
    }
    .product-filter-nav .nav-link.active .badge {
        background-color: #ffffff !important;
        color: #0d6efd !important;
    }
    .product-item-card {
        border-radius: 0.85rem;
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .product-item-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
    }
</style>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">{{ isset($category) ? 'Category Catalog' : 'Our Products' }}</span>
          <h1 class="text-capitalize mb-4 text-lg">{{ isset($category) ? $category->name : 'Categories & Products' }}</h1>
          @if(isset($category))
            <p class="text-white-50 mb-0">Browse all products and models under <strong>{{ $category->name }}</strong></p>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section py-5">
    <div class="container">
        <!-- Tab Navigation Filters -->
        <div class="text-center mb-5">
            <ul class="nav nav-pills product-filter-nav justify-content-center" id="product-tabs" role="tablist">
                @if(isset($isCategoryPage) && $isCategoryPage && isset($category))
                    {{-- Category Page: Filter by Models --}}
                    @php
                        $totalCatProducts = $category->products->count();
                        $noModelCount = $category->products->whereNull('product_model_id')->count();
                    @endphp

                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ ($activeModelSlug ?? 'all') == 'all' ? 'active' : '' }}" 
                                id="tab-btn-all" 
                                data-bs-toggle="pill" 
                                data-bs-target="#tab-pane-all" 
                                data-filter-slug="all" 
                                type="button" 
                                role="tab" 
                                aria-controls="tab-pane-all" 
                                aria-selected="{{ ($activeModelSlug ?? 'all') == 'all' ? 'true' : 'false' }}">
                            All <span class="badge bg-secondary">{{ $totalCatProducts }}</span>
                        </button>
                    </li>

                    @foreach($models as $model)
                        @php
                            $modelCount = $category->products->where('product_model_id', $model->id)->count();
                            $isModelActive = ($activeModelSlug ?? '') == $model->slug;
                        @endphp
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $isModelActive ? 'active' : '' }}" 
                                    id="tab-btn-{{ $model->slug }}" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#tab-pane-{{ $model->slug }}" 
                                    data-filter-slug="{{ $model->slug }}" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="tab-pane-{{ $model->slug }}" 
                                    aria-selected="{{ $isModelActive ? 'true' : 'false' }}">
                                {{ $model->name }} <span class="badge bg-secondary">{{ $modelCount }}</span>
                            </button>
                        </li>
                    @endforeach

                    @if($noModelCount > 0 && $models->count() > 0)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ ($activeModelSlug ?? '') == 'other' ? 'active' : '' }}" 
                                    id="tab-btn-other" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#tab-pane-other" 
                                    data-filter-slug="other" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="tab-pane-other" 
                                    aria-selected="{{ ($activeModelSlug ?? '') == 'other' ? 'true' : 'false' }}">
                                General <span class="badge bg-secondary">{{ $noModelCount }}</span>
                            </button>
                        </li>
                    @endif

                @else
                    {{-- Global Products Page: Filter by Categories --}}
                    @php
                        $grandTotal = $categories->pluck('products')->flatten()->count();
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" 
                                id="tab-btn-all" 
                                data-bs-toggle="pill" 
                                data-bs-target="#tab-pane-all" 
                                data-filter-slug="all" 
                                type="button" 
                                role="tab" 
                                aria-controls="tab-pane-all" 
                                aria-selected="true">
                            All <span class="badge bg-secondary">{{ $grandTotal }}</span>
                        </button>
                    </li>

                    @foreach($categories as $cat)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" 
                                    id="tab-btn-{{ $cat->slug }}" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#tab-pane-{{ $cat->slug }}" 
                                    data-filter-slug="{{ $cat->slug }}" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="tab-pane-{{ $cat->slug }}" 
                                    aria-selected="false">
                                {{ $cat->name }} <span class="badge bg-secondary">{{ $cat->products->count() }}</span>
                            </button>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <!-- Tab Panes Content -->
        <div class="tab-content" id="product-tabContent">
            @if(isset($isCategoryPage) && $isCategoryPage && isset($category))
                {{-- Pane: ALL Category Products --}}
                <div class="tab-pane fade {{ ($activeModelSlug ?? 'all') == 'all' ? 'show active' : '' }}" 
                     id="tab-pane-all" 
                     role="tabpanel" 
                     aria-labelledby="tab-btn-all">
                    <div class="row">
                        @forelse($category->products as $product)
                            @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'all_'])
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">No products available in this category yet.</h5>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Panes: For Each Model --}}
                @foreach($models as $model)
                    @php
                        $modelProducts = $category->products->where('product_model_id', $model->id);
                        $isModelActive = ($activeModelSlug ?? '') == $model->slug;
                    @endphp
                    <div class="tab-pane fade {{ $isModelActive ? 'show active' : '' }}" 
                         id="tab-pane-{{ $model->slug }}" 
                         role="tabpanel" 
                         aria-labelledby="tab-btn-{{ $model->slug }}">
                        <div class="row">
                            @forelse($modelProducts as $product)
                                @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'm_' . $model->id . '_'])
                            @empty
                                <div class="col-12 text-center py-5">
                                    <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No products currently available under <strong>{{ $model->name }}</strong> model.</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="switchFilterTab('all')">View All Products in {{ $category->name }}</button>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach

                {{-- Pane: Products Without Model --}}
                @if($noModelCount > 0 && $models->count() > 0)
                    <div class="tab-pane fade {{ ($activeModelSlug ?? '') == 'other' ? 'show active' : '' }}" 
                         id="tab-pane-other" 
                         role="tabpanel" 
                         aria-labelledby="tab-btn-other">
                        <div class="row">
                            @forelse($category->products->whereNull('product_model_id') as $product)
                                @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'other_'])
                            @empty
                                <div class="col-12 text-center py-5">
                                    <h5 class="text-muted">No general products found.</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif

            @else
                {{-- Global Listing: Pane ALL --}}
                <div class="tab-pane fade show active" id="tab-pane-all" role="tabpanel" aria-labelledby="tab-btn-all">
                    <div class="row">
                        @php $hasAnyProduct = false; @endphp
                        @foreach($categories as $cat)
                            @foreach($cat->products as $product)
                                @php $hasAnyProduct = true; @endphp
                                @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'all_c_' . $cat->id . '_'])
                            @endforeach
                        @endforeach

                        @if(!$hasAnyProduct)
                            <div class="col-12 text-center py-5">
                                <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">No products found.</h5>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Global Listing: Panes by Category --}}
                @foreach($categories as $cat)
                    <div class="tab-pane fade" id="tab-pane-{{ $cat->slug }}" role="tabpanel" aria-labelledby="tab-btn-{{ $cat->slug }}">
                        <div class="row">
                            @forelse($cat->products as $product)
                                @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'cat_' . $cat->id . '_'])
                            @empty
                                <div class="col-12 text-center py-5">
                                    <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No products available in {{ $cat->name }}.</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            @endif
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
  // Enquiry Modal setup
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

  // Helper function to switch tabs programmatically
  function switchFilterTab(slug) {
    var targetBtn = document.querySelector(`button[data-filter-slug="${slug}"]`);
    if (targetBtn && typeof bootstrap !== 'undefined') {
      var tabInstance = bootstrap.Tab.getOrCreateInstance(targetBtn);
      tabInstance.show();
    }
  }

  // Hash Navigation Support (#all, #model-slug, etc.)
  document.addEventListener("DOMContentLoaded", function () {
    function activateTabFromUrl() {
      var hash = window.location.hash ? window.location.hash.replace('#', '') : '';
      
      if (!hash) {
        @if(isset($activeModelSlug) && $activeModelSlug !== 'all')
          hash = '{{ $activeModelSlug }}';
        @else
          hash = 'all';
        @endif
      }

      var targetBtn = document.querySelector(`button[data-filter-slug="${hash}"]`) ||
                      document.querySelector(`button[data-bs-target="#tab-pane-${hash}"]`);

      if (targetBtn && typeof bootstrap !== 'undefined') {
        var tab = bootstrap.Tab.getOrCreateInstance(targetBtn);
        tab.show();
      }
    }

    activateTabFromUrl();

    // Listen for hash changes in URL
    window.addEventListener('hashchange', activateTabFromUrl);

    // Update URL hash when a tab is clicked
    var filterButtons = document.querySelectorAll('#product-tabs button[data-filter-slug]');
    filterButtons.forEach(function (btn) {
      btn.addEventListener('shown.bs.tab', function (e) {
        var slug = e.target.getAttribute('data-filter-slug');
        if (slug) {
          if (history.replaceState) {
            history.replaceState(null, null, '#' + slug);
          } else {
            window.location.hash = slug;
          }
        }
      });
    });
  });
</script>
@endpush
