@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!--  Row 1 -->
<div class="row">
  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Leads</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalContacts }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-warning round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-users text-warning"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Blogs</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalBlogs }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-primary round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-article text-primary"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Views</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalViews }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-eye text-success"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Active Blogs</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $activeBlogs }}</h4>
             <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-info round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-check text-info"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Visitors</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalVisitors }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-primary round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-world text-primary"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Inactive Blogs</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $inactiveBlogs }}</h4>
             <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-x text-danger"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Users</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalUsers }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-info round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-user text-info"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Orders</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalOrders }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-shopping-cart text-success"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Products</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalProducts }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-primary round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-box text-primary"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Models</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalModels }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-warning round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-list text-warning"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Categories</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalCategories }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-warning round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-category text-warning"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Reviews</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalReviews }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-star text-danger"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Orders / Inquiries</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ $totalInquiries }}</h4>
            <div class="d-flex align-items-center mb-3">
              <span class="me-1 rounded-circle bg-light-secondary round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-message-circle text-secondary"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
