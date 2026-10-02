@extends('admin.layouts.app')

@section('title', 'Blogs List')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="card-title fw-semibold">Blogs</h5>
      <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add Blog</a>
    </div>
    
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Image</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Title</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Author</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Views</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Action</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
          <tr>
            <td class="border-bottom-0">
                @if($blog->image)
                    <img src="{{ asset('storage/'.$blog->image) }}" width="50" class="rounded" />
                @else
                    <span class="badge bg-secondary">No Image</span>
                @endif
            </td>
            <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{ $blog->title }}</h6>
                <span class="fw-normal">{{ Str::limit($blog->short_description, 50) }}</span>                          
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal">{{ $blog->author ?? 'Admin' }}</p>
            </td>
            <td class="border-bottom-0">
              <span class="badge bg-success rounded-3 fw-semibold">{{ $blog->views }}</span>
            </td>
            <td class="border-bottom-0">
                <a class="btn btn-sm btn-info" href="{{ route('admin.blogs.show',$blog->id) }}">Show</a>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.blogs.edit',$blog->id) }}">Edit</a>
                <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
