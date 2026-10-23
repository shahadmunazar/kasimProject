@extends('frontend.layouts.main')

@section('title', 'Track Your Order | TC Smart Technology')

@section('content')
<div class="py-5 bg-light min-vh-100">
    <div class="container">
        <!-- Breadcrumb / Header -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10 text-center">
                <h2 class="fw-bold text-dark mb-2">Track Your Shipment</h2>
                <p class="text-muted">Enter your order details below or click your tracking link to view real-time delivery status.</p>
            </div>
        </div>

        <!-- Order Search Box -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <form method="POST" action="{{ route('tracking.search') }}" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-5">
                            <label class="form-label fw-bold small text-muted">ORDER NUMBER</label>
                            <input type="text" name="order_number" class="form-control form-control-lg" placeholder="e.g. ORD-6AC5DE..." value="{{ request('order_number', $order ? $order->order_number : '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold small text-muted">REGISTERED MOBILE</label>
                            <input type="text" name="phone" class="form-control form-control-lg" placeholder="10-digit mobile" value="{{ request('phone', $order ? $order->mobile : '') }}" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                                <i class="fa fa-search me-1"></i> Track
                            </button>
                        </div>
                    </form>

                    @if(!empty($error))
                        <div class="alert alert-danger mt-3 mb-0 py-2 small">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $error }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($order)
            @php
                $shipment = $order->latestShipment;
                $currentStatus = $order->effective_delivery_status;

                // Progress Step Calculation (0 to 4)
                $step = 0;
                if ($order->isPaid() || in_array($currentStatus, ['approved', 'processing', 'ready_to_ship', 'packed', 'shipped', 'in_transit', 'out_for_delivery', 'delivered'])) {
                    $step = 1; // Confirmed
                }
                if (in_array($currentStatus, ['ready_to_ship', 'packed', 'shipped', 'in_transit', 'out_for_delivery', 'delivered'])) {
                    $step = 2; // Packed
                }
                if (in_array($currentStatus, ['shipped', 'in_transit', 'out_for_delivery', 'delivered'])) {
                    $step = 3; // In Transit
                }
                if ($currentStatus === 'delivered') {
                    $step = 4; // Delivered
                }
            @endphp

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Progress Card -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <div>
                                <small class="text-muted text-uppercase fw-bold">ORDER REFERENCE</small>
                                <h4 class="fw-bold mb-0 text-primary font-monospace">{{ $order->order_number ?: ('#' . $order->id) }}</h4>
                                <small class="text-muted">Placed on {{ $order->created_at->format('M d, Y h:i A') }}</small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-{{ $currentStatus === 'delivered' ? 'success' : ($currentStatus === 'cancelled' ? 'danger' : 'primary') }} fs-6 px-3 py-2">
                                    {{ ucfirst(str_replace('_', ' ', $currentStatus)) }}
                                </span>
                                @if($order->expected_delivery_date)
                                    <div class="small text-muted mt-1">
                                        <i class="fa fa-calendar-check me-1"></i> Expected: {{ \Carbon\Carbon::parse($order->expected_delivery_date)->format('M d, Y') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <!-- Visual Step Progress Tracker -->
                            <div class="position-relative mb-5">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $step * 25 }}%;"></div>
                                </div>
                                <div class="d-flex justify-content-between position-absolute top-50 start-0 w-100 translate-middle-y">
                                    <!-- Step 0 -->
                                    <div class="text-center" style="width: 80px; margin-left: -20px;">
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-{{ $step >= 0 ? 'success text-white' : 'light text-muted border' }}" style="width: 38px; height: 38px;">
                                            <i class="fa fa-shopping-bag"></i>
                                        </div>
                                        <div class="small fw-bold mt-2">Placed</div>
                                    </div>
                                    <!-- Step 1 -->
                                    <div class="text-center" style="width: 80px;">
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-{{ $step >= 1 ? 'success text-white' : 'light text-muted border' }}" style="width: 38px; height: 38px;">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="small fw-bold mt-2">Confirmed</div>
                                    </div>
                                    <!-- Step 2 -->
                                    <div class="text-center" style="width: 80px;">
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-{{ $step >= 2 ? 'success text-white' : 'light text-muted border' }}" style="width: 38px; height: 38px;">
                                            <i class="fa fa-box"></i>
                                        </div>
                                        <div class="small fw-bold mt-2">Packed</div>
                                    </div>
                                    <!-- Step 3 -->
                                    <div class="text-center" style="width: 80px;">
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-{{ $step >= 3 ? 'success text-white' : 'light text-muted border' }}" style="width: 38px; height: 38px;">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="small fw-bold mt-2">In Transit</div>
                                    </div>
                                    <!-- Step 4 -->
                                    <div class="text-center" style="width: 80px; margin-right: -20px;">
                                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-{{ $step >= 4 ? 'success text-white' : 'light text-muted border' }}" style="width: 38px; height: 38px;">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="small fw-bold mt-2">Delivered</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Carrier & AWB Details Callout -->
                            @php
                                $cName = $order->effective_courier_name ?: ($shipment ? $shipment->courier_name : null);
                                $tId = $order->effective_tracking_id ?: ($shipment ? $shipment->awb_number : null);
                                $tUrl = $order->effective_tracking_url ?: ($shipment ? $shipment->tracking_url : null);
                            @endphp
                            @if($tId || $cName)
                                <div class="bg-light rounded-3 p-3 mb-3 border d-flex flex-wrap justify-content-between align-items-center gap-3">
                                    <div>
                                        <div class="text-muted small fw-bold">CARRIER / DISPATCH PARTNER</div>
                                        <h6 class="fw-bold text-dark mb-0">
                                            <i class="fa fa-truck me-1 text-primary"></i>
                                            {{ $cName ?: 'Express Courier' }}
                                        </h6>
                                    </div>
                                    @if($tId)
                                        <div>
                                            <div class="text-muted small fw-bold">AWB / TRACKING NO.</div>
                                            <span class="font-monospace fw-bold text-primary fs-6">{{ $tId }}</span>
                                        </div>
                                    @endif
                                    @if($tUrl)
                                        <div>
                                            <a href="{{ $tUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary fw-bold">
                                                <i class="fa fa-external-link-alt me-1"></i> Track on {{ $cName ?: 'Courier' }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="alert alert-light border small text-muted mb-4 py-2">
                                    <i class="fa fa-info-circle text-primary me-1"></i>
                                    <strong>Status Notice:</strong> Delivery status is manually updated based on courier updates. Click "Track on {{ $cName ?: 'Courier' }}" to view live scans directly on the carrier's portal.
                                </div>
                            @endif

                            <div class="row">
                                <!-- Tracking Timeline -->
                                <div class="col-md-7 mb-4 mb-md-0">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Tracking History</h5>
                                    @if($shipment && $shipment->events->isNotEmpty())
                                        <div class="position-relative ps-4 border-start border-2 border-primary ms-2">
                                            @foreach($shipment->events as $ev)
                                                <div class="position-relative mb-4 ps-2">
                                                    <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle border border-white" style="width: 14px; height: 14px; left: -17px !important;"></span>
                                                    <div class="fw-bold text-dark text-capitalize">
                                                        {{ str_replace('_', ' ', $ev->status) }}
                                                        @if($ev->location)
                                                            <small class="text-muted fw-normal">({{ $ev->location }})</small>
                                                        @endif
                                                    </div>
                                                    <p class="text-muted small mb-1">{{ $ev->description }}</p>
                                                    <small class="text-muted"><i class="fa fa-clock me-1"></i>{{ $ev->event_timestamp ? $ev->event_timestamp->format('M d, Y h:i A') : '' }}</small>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="p-3 bg-light rounded text-muted small">
                                            Order received and queued for dispatch. Tracking events will appear here as soon as your parcel is scanned.
                                        </div>
                                    @endif
                                </div>

                                <!-- Shipping Address & Package Info -->
                                <div class="col-md-5">
                                    <div class="card border bg-light h-100">
                                        <div class="card-body">
                                            <h6 class="fw-bold text-dark mb-3"><i class="fa fa-map-marker-alt me-2 text-danger"></i>Delivery Destination</h6>
                                            <p class="mb-1 fw-bold">{{ $order->customer_name }}</p>
                                            <p class="mb-1 small text-muted">{{ $order->address }}</p>
                                            <p class="mb-2 small text-muted">{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                                            
                                            <hr>

                                            <h6 class="fw-bold text-dark mb-2"><i class="fa fa-boxes me-2 text-primary"></i>Items in Package</h6>
                                            <ul class="list-unstyled mb-0">
                                                @foreach($order->items as $item)
                                                    <li class="d-flex justify-content-between align-items-center py-1 small">
                                                        <span>{{ $item->product ? $item->product->name : 'Product' }} (x{{ $item->quantity }})</span>
                                                        <span class="fw-bold">₹{{ number_format($item->price * $item->quantity, 2) }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            @if($currentStatus === 'delivered' && $shipment && $shipment->recipient_name)
                                                <hr>
                                                <div class="alert alert-success py-2 mb-0 small">
                                                    <i class="fa fa-check-circle me-1"></i> Delivered to: <strong>{{ $shipment->recipient_name }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
