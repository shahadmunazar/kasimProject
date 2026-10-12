@extends('frontend.layouts.main')

@section('meta_title', 'My Wishlist - TC SMART')

@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Your Saved Favorites</span>
          <h1 class="text-capitalize mb-3 text-lg">My Wishlist</h1>
          <p class="text-white-50 mb-0">Saved products you love. Add them to cart or buy them anytime.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
            <div>
                <h4 class="fw-bold mb-0 text-dark">
                    <i class="fa fa-heart text-danger me-2"></i> Wishlist Items (<span id="wishlistPageCount">{{ $totalCount }}</span>)
                </h4>
            </div>
            <a href="{{ route('products.listing') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-semibold">
                <i class="fa fa-shopping-bag me-1"></i> Browse More Products
            </a>
        </div>

        @if($wishlistItems && $wishlistItems->count() > 0)
            <div class="row" id="wishlistItemsGrid">
                @foreach($wishlistItems as $wish)
                    @php
                        $product = $wish->product;
                    @endphp
                    @if($product)
                        @include('frontend.products.partials.card', ['product' => $product, 'prefix' => 'w_' . $product->id . '_'])
                    @endif
                @endforeach
            </div>
        @else
            <!-- Empty Wishlist -->
            <div class="row justify-content-center py-5">
                <div class="col-lg-6 text-center">
                    <div class="card border-0 shadow-sm rounded-4 p-5 bg-light">
                        <i class="fa fa-heart fa-4x text-muted mb-4 opacity-50"></i>
                        <h3 class="fw-bold text-dark mb-2">Your Wishlist is Empty</h3>
                        <p class="text-muted mb-4">You haven't saved any products to your wishlist yet. Click the heart icon on any product to save it here!</p>
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
