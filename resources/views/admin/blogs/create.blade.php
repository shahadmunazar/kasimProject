@extends('admin.layouts.app')

@section('title', 'Create Blog')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Add New Blog</h5>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" id="short_description" rows="3">{{ old('short_description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" rows="10">{{ old('content') }}</textarea>
        </div>

        <h5 class="mt-4 mb-3">SEO Settings</h5>
        <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title') }}">
        </div>
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ old('meta_description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords (Comma separated)</label>
            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark">Back</a>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
