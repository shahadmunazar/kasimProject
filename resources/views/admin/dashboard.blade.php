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

<!-- Inventory & Logistics Operational Section -->
<div class="row mt-3">
  <div class="col-12 mb-3">
    <h4 class="fw-bold text-dark mb-1"><i class="ti ti-building-warehouse text-primary me-2"></i>Inventory & Logistics Control</h4>
    <p class="text-muted small">Live stock valuation, order dispatch pipelines, and critical inventory warnings.</p>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="bg-light-primary text-primary rounded-3 p-3 me-3">
            <i class="ti ti-box fs-6"></i>
          </div>
          <div>
            <span class="text-muted small fw-bold">TOTAL STOCK</span>
            <h3 class="fw-bold mb-0 text-dark">{{ number_format($totalStock) }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="bg-light-success text-success rounded-3 p-3 me-3">
            <i class="ti ti-currency-rupee fs-6"></i>
          </div>
          <div>
            <span class="text-muted small fw-bold">INVENTORY VALUE</span>
            <h3 class="fw-bold mb-0 text-dark">₹{{ number_format($totalValuation, 2) }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="bg-light-warning text-warning rounded-3 p-3 me-3">
            <i class="ti ti-alert-triangle fs-6"></i>
          </div>
          <div>
            <span class="text-muted small fw-bold">LOW STOCK</span>
            <h3 class="fw-bold mb-0 text-warning">{{ $lowStockCount }}</h3>
            <a href="{{ route('admin.inventory.index', ['filter' => 'low']) }}" class="small text-warning text-decoration-none">Review items &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="bg-light-danger text-danger rounded-3 p-3 me-3">
            <i class="ti ti-circle-x fs-6"></i>
          </div>
          <div>
            <span class="text-muted small fw-bold">OUT OF STOCK</span>
            <h3 class="fw-bold mb-0 text-danger">{{ $outOfStockCount }}</h3>
            <a href="{{ route('admin.inventory.index', ['filter' => 'out']) }}" class="small text-danger text-decoration-none">Restock now &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-4 mt-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-3 d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small fw-bold">AWAITING PACKING / DISPATCH</span>
          <h4 class="fw-bold text-dark mb-0">{{ $pendingShipmentsCount }}</h4>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Fulfill</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-4 mt-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-3 d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small fw-bold">SHIPMENTS IN TRANSIT</span>
          <h4 class="fw-bold text-dark mb-0">{{ $inTransitCount }}</h4>
        </div>
        <a href="{{ route('admin.shipments.index') }}" class="btn btn-sm btn-outline-info">Track</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-4 mt-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-3 d-flex align-items-center justify-content-between">
        <div>
          <span class="text-muted small fw-bold">DELIVERED SHIPMENTS</span>
          <h4 class="fw-bold text-success mb-0">{{ $deliveredShipmentsCount }}</h4>
        </div>
        <span class="badge bg-light-success text-success"><i class="ti ti-check"></i> Completed</span>
      </div>
    </div>
  </div>
</div>

<!-- Activity Feeds Row -->
<div class="row mt-4">
  <!-- Recent Orders Table -->
  <div class="col-lg-7 mb-4">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h5 class="card-title fw-bold mb-0">Recent E-Commerce Orders</h5>
        <a href="{{ route('admin.orders.index') }}" class="small text-primary fw-bold text-decoration-none">View All &rarr;</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Payment</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentOrders as $rOrder)
                <tr>
                  <td>
                    <a href="{{ route('admin.orders.show', $rOrder->id) }}" class="fw-bold text-primary font-monospace">
                      #{{ $rOrder->order_number ?: $rOrder->id }}
                    </a>
                  </td>
                  <td>{{ $rOrder->customer_name }}</td>
                  <td class="fw-bold">₹{{ number_format($rOrder->amount, 2) }}</td>
                  <td>
                    <span class="badge bg-{{ $rOrder->payment_status === 'paid' ? 'success' : 'secondary' }}">
                      {{ ucfirst($rOrder->payment_status ?: 'pending') }}
                    </span>
                  </td>
                  <td>
                    <span class="badge bg-{{ in_array($rOrder->status, ['approved', 'delivered']) ? 'success' : 'warning text-dark' }}">
                      {{ ucfirst($rOrder->status) }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center py-4 text-muted">No orders placed yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Stock Movements Audit -->
  <div class="col-lg-5 mb-4">
    <div class="card border-0 shadow-sm h-100">
      <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h5 class="card-title fw-bold mb-0">Recent Stock Movements</h5>
        <a href="{{ route('admin.inventory.movements') }}" class="small text-primary fw-bold text-decoration-none">Audit Log &rarr;</a>
      </div>
      <div class="card-body p-3">
        @forelse($recentMovements as $mv)
          <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
            <div>
              <div class="fw-bold text-dark small">{{ $mv->product ? $mv->product->name : 'Product' }}</div>
              <small class="text-muted">{{ ucfirst(str_replace('_', ' ', $mv->type)) }} | {{ $mv->created_at->diffForHumans() }}</small>
            </div>
            <div class="text-end">
              <span class="fw-bold fs-6 {{ $mv->quantity > 0 ? 'text-success' : 'text-danger' }}">
                {{ $mv->quantity > 0 ? '+' . $mv->quantity : $mv->quantity }}
              </span>
              <div class="small text-muted font-monospace">Stock: {{ $mv->new_quantity }}</div>
            </div>
          </div>
        @empty
          <p class="text-center text-muted py-4 mb-0">No stock movements recorded yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
