@extends('admin.layouts.app')

@section('title', 'Show Blog')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h5 class="card-title fw-semibold">{{ $blog->title }}</h5>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark">Back</a>
    </div>

    @if($blog->image)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/'.$blog->image) }}" class="img-fluid rounded" style="max-height: 400px;" />
        </div>
    @endif

    <div class="mb-3">
        <strong>Author:</strong> {{ $blog->author ?? 'Admin' }} | 
        <strong>Date:</strong> {{ $blog->created_at->format('d M, Y') }}
    </div>

    <div class="mb-4">
        <strong>Short Description:</strong>
        <p class="text-muted">{{ $blog->short_description }}</p>
    </div>

    <div class="blog-content">
        {!! nl2br(e($blog->content)) !!}
    </div>
  </div>
</div>
@endsection
