@extends('frontend.layouts.main')

@section('meta_title', $blog->meta_title ?? $blog->title)
@section('meta_keywords', $blog->meta_keywords ?? '')
@section('meta_description', $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160))

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ $blog->title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($blog->title, 20) }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="mb-5">
                    @if($blog->image)
                         <img class="img-fluid w-100 rounded mb-5" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
                    @endif
                    <div class="mb-3">
                         <span class="text-primary me-2"><i class="far fa-calendar-alt me-2"></i>{{ $blog->created_at->format('d M, Y') }}</span>
                         <span class="text-primary"><i class="far fa-user me-2"></i>{{ $blog->author ?? 'Admin' }}</span>
                    </div>
                    <h1 class="mb-4">{{ $blog->title }}</h1>
                    <div class="blog-content">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Start -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <!-- Search Form -->
                <div class="mb-5">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h4 class="mb-4">Recent Post</h4>
                    @foreach($recentBlogs as $recent)
                    <div class="d-flex mb-3">
                        @if($recent->image)
                             <img class="img-fluid rounded" src="{{ asset('storage/'.$recent->image) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        @else
                              <img class="img-fluid rounded" src="{{ asset('assets/img/service-1.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        @endif
                        <div class="d-flex flex-column justify-content-center ps-3">
                            <a href="{{ route('blogs.details', $recent->slug) }}" class="h6 lh-base mb-1">{{ Str::limit($recent->title, 30) }}</a>
                            <div class="small text-muted"><i class="far fa-calendar-alt me-1"></i>{{ $recent->created_at->format('d M, Y') }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog Detail End -->
@endsection
