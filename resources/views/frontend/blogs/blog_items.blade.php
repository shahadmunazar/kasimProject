@foreach($blogs as $blog)
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="service-item rounded h-100 p-4">
        <div class="mb-3">
            @if($blog->image)
                 <img class="img-fluid rounded w-100" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" style="height: 250px; object-fit: cover;">
            @else
                 <img class="img-fluid rounded w-100" src="{{ asset('assets/img/service-1.jpg') }}" alt="Default Image" style="height: 250px; object-fit: cover;">
            @endif
        </div>
        <div class="mb-3">
            <span class="text-primary me-2"><i class="far fa-calendar-alt me-2"></i>{{ $blog->created_at->format('d M, Y') }}</span>
            <span class="text-primary"><i class="far fa-user me-2"></i>{{ $blog->author ?? 'Admin' }}</span>
        </div>
        <h4 class="mb-3">{{ Str::limit($blog->title, 50) }}</h4>
        <p class="mb-4">{{ Str::limit($blog->short_description, 100) }}</p>
        <a class="btn btn-primary py-2 px-4" href="{{ route('blogs.details', $blog->slug) }}">Read More</a>
    </div>
</div>
@endforeach
