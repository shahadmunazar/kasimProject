@extends('frontend.layouts.main')

@section('title', 'Delivery Agent Portal | TC Smart Technology')

@section('content')
<div class="py-4 bg-light min-vh-100">
    <div class="container">
        <!-- Delivery Agent Header Card -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px;">
                        <i class="fa fa-biking fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0 text-dark">{{ $user->name }}</h4>
                        <div class="small text-muted font-monospace">Agent ID: {{ $personnel->employee_code }} | Vehicle: {{ $personnel->vehicle_type }} ({{ $personnel->vehicle_number ?: 'Fleet' }})</div>
                    </div>
                </div>
                <div>
                    @if($personnel->is_available)
                        <span class="badge bg-success fs-6 px-3 py-2"><i class="fa fa-dot-circle me-1"></i> Active / On Duty</span>
                    @else
                        <span class="badge bg-secondary fs-6 px-3 py-2"><i class="fa fa-moon me-1"></i> Off Duty</span>
                    @endif
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Active Deliveries Section -->
        <h5 class="fw-bold text-dark mb-3">
            <i class="fa fa-box-open me-2 text-primary"></i> Assigned Deliveries ({{ $activeDeliveries->count() }})
        </h5>

        <div class="row g-3 mb-5">
            @forelse($activeDeliveries as $shp)
                @php
                    $order = $shp->order;
                    $mapAddress = urlencode(($order ? $order->address : '') . ', ' . ($order ? $order->city : '') . ', ' . ($order ? $order->pincode : ''));
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center p-3">
                            <span class="fw-bold font-monospace text-primary">#{{ $shp->shipment_number }}</span>
                            <span class="badge bg-{{ $shp->status === 'out_for_delivery' ? 'info text-dark' : 'warning text-dark' }}">
                                {{ ucfirst(str_replace('_', ' ', $shp->status)) }}
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-dark mb-1">{{ $order ? $order->customer_name : 'Customer' }}</h6>
                            <p class="small text-muted mb-2">
                                <i class="fa fa-map-marker-alt text-danger me-1"></i>
                                {{ $order ? $order->address . ', ' . $order->city . ' - ' . $order->pincode : 'No address provided' }}
                            </p>
                            
                            @if($order && $order->mobile)
                                <div class="mb-3">
                                    <a href="tel:{{ $order->mobile }}" class="btn btn-sm btn-outline-success">
                                        <i class="fa fa-phone me-1"></i> Call Customer
                                    </a>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $mapAddress }}" target="_blank" class="btn btn-sm btn-outline-primary ms-1">
                                        <i class="fa fa-directions me-1"></i> Maps
                                    </a>
                                </div>
                            @endif

                            <div class="bg-light rounded p-2 small mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Payment Method:</span>
                                    <span class="fw-bold">{{ $order ? $order->payment_method : 'QR / Prepaid' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <span>Total Amount:</span>
                                    <span class="fw-bold text-primary">₹{{ number_format($order ? $order->amount : 0, 2) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('delivery.shipments.show', $shp->id) }}" class="btn btn-primary w-100 fw-bold">
                                Update Progress / Deliver <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center text-muted">
                        <i class="fa fa-check-circle fa-3x text-success mb-3"></i>
                        <h5>No pending deliveries assigned!</h5>
                        <p class="small mb-0">You have completed all active deliveries for today. Check back later for new shipments.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Recent Completed Deliveries -->
        @if($completedDeliveries->isNotEmpty())
            <h5 class="fw-bold text-dark mb-3">
                <i class="fa fa-history me-2 text-secondary"></i> Recently Completed
            </h5>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Shipment</th>
                                <th>Customer</th>
                                <th>Destination</th>
                                <th>Delivered At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedDeliveries as $cShp)
                                <tr>
                                    <td class="font-monospace fw-bold">{{ $cShp->shipment_number }}</td>
                                    <td>{{ $cShp->order ? $cShp->order->customer_name : 'N/A' }}</td>
                                    <td><small>{{ $cShp->order ? $cShp->order->city : '' }}</small></td>
                                    <td><small>{{ $cShp->delivered_at ? $cShp->delivered_at->format('M d, Y h:i A') : '' }}</small></td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
