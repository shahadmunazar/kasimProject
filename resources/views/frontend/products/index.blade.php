@extends('frontend.layouts.main')

@section('meta_title', 'Products')

@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our Products</span>
          <h1 class="text-capitalize mb-5 text-lg">Categories & Products</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
    <div class="container">
        <!-- Tab Navigation -->
        <ul class="nav nav-pills mb-4 justify-content-center" id="product-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
            </li>
            @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" id="cat-{{ $category->id }}-tab" data-toggle="pill" href="#cat-{{ $category->id }}" role="tab" aria-controls="cat-{{ $category->id }}" aria-selected="false">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="product-tabContent">
            <!-- All Products Tab -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">
                    @foreach($categories as $category)
                        @foreach($category->products as $product)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    @if($product->images && count($product->images) > 0)
                                        @if(count($product->images) > 1)
                                            <div id="carouselAll{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach($product->images as $index => $img)
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/' . $img) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModalAll{{ $product->id }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAll{{ $product->id }}" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselAll{{ $product->id }}" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/' . $product->images[0]) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModalAll{{ $product->id }}">
                                        @endif

                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModalAll{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                          <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header border-0 pb-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body text-center pt-0">
                                                @if(count($product->images) > 1)
                                                    <div id="modalCarouselAll{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach($product->images as $index => $img)
                                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid" alt="{{ $product->name }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#modalCarouselAll{{ $product->id }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#modalCarouselAll{{ $product->id }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('storage/' . $product->images[0]) }}" class="img-fluid" alt="{{ $product->name }}">
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    @endif
                                    <div class="card-body text-center">
                                        <h4 class="card-title mt-3">{{ $product->name }}</h4>
                                        <h6 class="text-muted">{{ $category->name }}</h6>
                                        @if($product->offer_price)
                                            <p class="card-text mb-0"><del>${{ $product->price }}</del> <strong class="text-danger">${{ $product->offer_price }}</strong></p>
                                        @elseif($product->price)
                                            <p class="card-text mb-0"><strong>${{ $product->price }}</strong></p>
                                        @endif
                                        <p class="card-text mt-3">{!! $product->description !!}</p>
                                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-outline-primary">View Details</a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buyModal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Individual Category Tabs -->
            @foreach($categories as $category)
                <div class="tab-pane fade" id="cat-{{ $category->id }}" role="tabpanel" aria-labelledby="cat-{{ $category->id }}-tab">
                    <div class="row">
                        @if($category->products->isEmpty())
                            <div class="col-12 text-center">
                                <p>No products available in this category.</p>
                            </div>
                        @else
                            @foreach($category->products as $product)
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                    @if($product->images && count($product->images) > 0)
                                        @if(count($product->images) > 1)
                                            <div id="carouselCat{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach($product->images as $index => $img)
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('storage/' . $img) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModalCat{{ $product->id }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCat{{ $product->id }}" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCat{{ $product->id }}" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/' . $product->images[0]) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain; background-color: #f8f9fa; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModalCat{{ $product->id }}">
                                        @endif

                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModalCat{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                          <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header border-0 pb-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body text-center pt-0">
                                                @if(count($product->images) > 1)
                                                    <div id="modalCarouselCat{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach($product->images as $index => $img)
                                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid" alt="{{ $product->name }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#modalCarouselCat{{ $product->id }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#modalCarouselCat{{ $product->id }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('storage/' . $product->images[0]) }}" class="img-fluid" alt="{{ $product->name }}">
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    @endif
                                    <div class="card-body text-center">
                                        <h4 class="card-title mt-3">{{ $product->name }}</h4>
                                        @if($product->offer_price)
                                            <p class="card-text mb-0"><del>${{ $product->price }}</del> <strong class="text-danger">${{ $product->offer_price }}</strong></p>
                                        @elseif($product->price)
                                            <p class="card-text mb-0"><strong>${{ $product->price }}</strong></p>
                                        @endif
                                        <p class="card-text mt-3">{!! $product->description !!}</p>
                                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-outline-primary">View Details</a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buyModal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

<!-- Buy Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('products.inquiry') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="buyModalLabel">Buy Product</h5>
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
          <button type="submit" class="btn btn-primary">Submit Order</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  var buyModal = document.getElementById('buyModal')
  if (buyModal) {
    buyModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget
      var productId = button.getAttribute('data-product-id')
      var productName = button.getAttribute('data-product-name')
      
      var modalProductId = buyModal.querySelector('#modalProductId')
      var modalProductName = buyModal.querySelector('#modalProductName')
      
      modalProductId.value = productId
      modalProductName.textContent = productName
    })
  }
</script>
@endpush
