@extends('frontend.layouts.main')

@section('meta_title', 'Latest Insights & Industry Updates | TC Smart Technology Blog')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Latest Blogs</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Our Blogs</p>
            <h1 class="display-5 mb-5">Insights & Industry Updates</h1>
        </div>
        <div class="row g-4" id="blog-container">
            @include('frontend.blogs.blog_items')
        </div>
        
        @if($blogs->hasMorePages())
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button id="load-more-btn" class="btn btn-primary py-2 px-5" data-next-page="{{ $blogs->nextPageUrl() }}">Load More</button>
                <div id="loading-spinner" class="spinner-border text-primary" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Blog End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#load-more-btn').click(function() {
            var nextPageUrl = $(this).data('next-page');
            var button = $(this);
            var spinner = $('#loading-spinner');

            if (nextPageUrl) {
                button.hide();
                spinner.show();

                $.ajax({
                    url: nextPageUrl,
                    type: 'GET',
                    success: function(response) {
                        $('#blog-container').append(response.html);
                        spinner.hide();
                        
                        if (response.next_page_url) {
                            button.data('next-page', response.next_page_url);
                            button.show();
                        } else {
                            button.remove(); // No more pages
                        }
                    },
                    error: function() {
                        spinner.hide();
                        button.show();
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong. Please try again.'
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
