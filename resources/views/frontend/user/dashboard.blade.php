@extends('frontend.user.layout')

@section('dashboard_content')
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        <h4 class="mb-4">Profile Information</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('frontend.dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-4 align-items-center">
                <div class="col-auto">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle border" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        @php
                            $nameParts = explode(' ', trim($user->name));
                            $initials = strtoupper(substr($nameParts[0], 0, 1));
                            if (count($nameParts) > 1) {
                                $initials .= strtoupper(substr(end($nameParts), 0, 1));
                            }
                        @endphp
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white border" style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: bold;">
                            {{ $initials }}
                        </div>
                    @endif
                </div>
                <div class="col">
                    <label class="form-label fw-bold">Profile Photo</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                    <small class="text-muted">Upload a new photo to change your avatar (max 2MB).</small>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-muted">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control fw-bold" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <label class="form-label text-muted">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control fw-bold" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label text-muted">Phone Number</label>
                    <input type="text" name="phone" class="form-control fw-bold" value="{{ old('phone', $user->phone) }}" placeholder="e.g. 9876543210">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">Save Changes</button>
            </div>
        </form>

    </div>
</div>
@endsection
