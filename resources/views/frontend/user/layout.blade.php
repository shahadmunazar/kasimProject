@extends('frontend.layouts.main')

@section('content')
<div class="container py-4 py-lg-5 mt-2 mt-lg-4">
    <div class="row">
        <!-- Dashboard Sidebar Navigation -->
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
            <div class="card shadow-sm border-0 sticky-top user-dashboard-sidebar" style="top: 110px; z-index: 10; border-radius: 16px; overflow: hidden; background: #ffffff;">
                <div class="card-body p-0">
                    <div class="p-4 text-center border-bottom bg-light rounded-top">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2 shadow-sm" style="width: 64px; height: 64px; font-size: 24px; font-weight: 700;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h5 class="mb-0 fw-bold text-dark text-truncate" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</h5>
                        <small class="text-muted text-break d-block mt-1">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="list-group list-group-flush border-0">
                        <a href="{{ route('frontend.dashboard.profile') }}" class="list-group-item list-group-item-action py-3 px-3 {{ request()->routeIs('frontend.dashboard.profile*') ? 'active fw-bold text-white' : 'text-dark' }}">
                            <i class="fa fa-user me-2 {{ request()->routeIs('frontend.dashboard.profile*') ? 'text-white' : 'text-primary' }}"></i> My Profile
                        </a>
                        <a href="{{ route('frontend.dashboard.orders') }}" class="list-group-item list-group-item-action py-3 px-3 {{ request()->routeIs('frontend.dashboard.order*') ? 'active fw-bold text-white' : 'text-dark' }}">
                            <i class="fa fa-shopping-bag me-2 {{ request()->routeIs('frontend.dashboard.order*') ? 'text-white' : 'text-primary' }}"></i> My Orders
                        </a>
                        <a href="{{ route('frontend.dashboard.addresses') }}" class="list-group-item list-group-item-action py-3 px-3 {{ request()->routeIs('frontend.dashboard.addresses*') ? 'active fw-bold text-white' : 'text-dark' }}">
                            <i class="fa fa-map-marker-alt me-2 {{ request()->routeIs('frontend.dashboard.addresses*') ? 'text-white' : 'text-primary' }}"></i> My Addresses
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 px-3 text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Dashboard Content Column -->
        <div class="col-lg-9 col-md-8">
            @yield('dashboard_content')
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection
