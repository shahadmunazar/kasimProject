@extends('frontend.layouts.main')

@section('content')
<div class="container py-5 mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="p-4 text-center border-bottom">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px; font-size: 24px;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="list-group list-group-flush border-0">
                        <a href="{{ route('frontend.dashboard.profile') }}" class="list-group-item list-group-item-action {{ request()->routeIs('frontend.dashboard.profile') ? 'active' : '' }}">
                            <i class="fa fa-user me-2"></i> My Profile
                        </a>
                        <a href="{{ route('frontend.dashboard.orders') }}" class="list-group-item list-group-item-action {{ request()->routeIs('frontend.dashboard.orders') ? 'active' : '' }}">
                            <i class="fa fa-shopping-bag me-2"></i> My Orders
                        </a>
                        <a href="{{ route('frontend.dashboard.addresses') }}" class="list-group-item list-group-item-action {{ request()->routeIs('frontend.dashboard.addresses') ? 'active' : '' }}">
                            <i class="fa fa-map-marker-alt me-2"></i> My Addresses
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('dashboard_content')
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection
