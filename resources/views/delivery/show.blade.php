@extends('frontend.layouts.main')

@section('title', 'Manage Delivery | TC Smart Technology')

@section('content')
<div class="py-4 bg-light min-vh-100">
    <div class="container" style="max-width: 720px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('delivery.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-arrow-left me-1"></i> Deliveries
            </a>
            <span class="badge bg-{{ $shipment->status === 'delivered' ? 'success' : 'primary' }} fs-6">
                {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
            </span>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @php
            $order = $shipment->order;
            $mapAddress = urlencode(($order ? $order->address : '') . ', ' . ($order ? $order->city : '') . ', ' . ($order ? $order->pincode : ''));
        @endphp

        <!-- Delivery Destination Card -->
        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
            <small class="text-muted text-uppercase fw-bold">CUSTOMER & DESTINATION</small>
            <h4 class="fw-bold text-dark mt-1 mb-2">{{ $order ? $order->customer_name : 'Customer' }}</h4>
            <p class="mb-3 text-secondary">
                <i class="fa fa-map-marker-alt text-danger me-1"></i>
                {{ $order ? $order->address : '' }}<br>
                {{ $order ? $order->city . ', ' . $order->state . ' - ' . $order->pincode : '' }}
            </p>

            <div class="d-flex gap-2 mb-2">
                @if($order && $order->mobile)
                    <a href="tel:{{ $order->mobile }}" class="btn btn-success flex-fill fw-bold py-2">
                        <i class="fa fa-phone me-1"></i> Call Customer
                    </a>
                @endif
                <a href="https://www.google.com/maps/search/?api=1&query={{ $mapAddress }}" target="_blank" class="btn btn-primary flex-fill fw-bold py-2">
                    <i class="fa fa-directions me-1"></i> Navigate (Maps)
                </a>
            </div>
        </div>

        <!-- Package & Items Card -->
        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
            <small class="text-muted text-uppercase fw-bold">PACKAGE CONTENTS</small>
            <h6 class="fw-bold text-dark mt-1 font-monospace">{{ $shipment->shipment_number }}</h6>
            <ul class="list-unstyled mb-3">
                @if($order && $order->items)
                    @foreach($order->items as $item)
                        <li class="d-flex justify-content-between py-1 border-bottom small">
                            <span>{{ $item->product ? $item->product->name : 'Product' }}</span>
                            <span class="fw-bold">Qty: {{ $item->quantity }}</span>
                        </li>
                    @endforeach
                @endif
            </ul>

            <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
                <span class="fw-bold">Payment Collection:</span>
                <span class="fw-bold text-success fs-5">
                    {{ $order && $order->payment_method === 'cod' ? 'Collect ₹' . number_format($order->amount, 2) : 'Prepaid / Verified' }}
                </span>
            </div>
        </div>

        <!-- Quick Status Actions -->
        @if($shipment->status !== 'delivered')
            <div class="card border-0 shadow-sm rounded-4 mb-4 p-4 bg-white">
                <h6 class="fw-bold text-dark mb-3">Update Delivery Status</h6>
                
                @if($shipment->status !== 'out_for_delivery')
                    <form action="{{ route('delivery.shipments.progress', $shipment->id) }}" method="POST" class="mb-3">
                        @csrf
                        <input type="hidden" name="status" value="out_for_delivery">
                        <button type="submit" class="btn btn-outline-primary w-100 fw-bold py-2">
                            <i class="fa fa-biking me-1"></i> Mark "Out for Delivery"
                        </button>
                    </form>
                @endif

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success btn-lg fw-bold" data-bs-toggle="modal" data-bs-target="#deliveredModal">
                        <i class="fa fa-check-circle me-1"></i> Delivered (Proof of Delivery)
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#failedModal">
                        <i class="fa fa-times-circle me-1"></i> Report Failed Attempt / Issue
                    </button>
                </div>
            </div>
        @else
            <div class="alert alert-success rounded-4 text-center p-4">
                <i class="fa fa-check-circle fa-2x mb-2 text-success"></i>
                <h5 class="fw-bold">Shipment Delivered!</h5>
                <p class="small mb-0">Delivered to: <strong>{{ $shipment->recipient_name }}</strong> on {{ $shipment->delivered_at ? $shipment->delivered_at->format('M d, Y h:i A') : '' }}.</p>
            </div>
        @endif
    </div>
</div>

<!-- Delivered Modal -->
<div class="modal fade" id="deliveredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('delivery.shipments.attempt', $shipment->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <input type="hidden" name="status" value="delivered">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-success">Confirm Successful Delivery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Recipient Name <span class="text-danger">*</span></label>
                    <input type="text" name="recipient_name" class="form-control form-control-lg" required value="{{ $order ? $order->customer_name : '' }}" placeholder="Name of person receiving the package">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Proof of Delivery Photo (Optional)</label>
                    <input type="file" name="proof_photo" class="form-control" accept="image/*" capture="environment">
                    <small class="text-muted">Take a photo of package handed over or doorstep.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Remarks</label>
                    <textarea name="notes" class="form-control" rows="2" placeholder="Handed over directly, security desk, etc."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success fw-bold">Submit Confirmation</button>
            </div>
        </form>
    </div>
</div>

<!-- Failed Attempt Modal -->
<div class="modal fade" id="failedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('delivery.shipments.attempt', $shipment->id) }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-danger">Report Delivery Issue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Status Action <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="failed">Delivery Failed Today</option>
                        <option value="rescheduled">Customer Requested Reschedule</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reason for Non-Delivery <span class="text-danger">*</span></label>
                    <select name="failure_reason" class="form-select" required>
                        <option value="Customer unavailable">Customer unavailable / Phone switched off</option>
                        <option value="Premises closed">Premises closed / Door locked</option>
                        <option value="Address unfindable">Wrong or incomplete address</option>
                        <option value="Customer refused">Customer refused package</option>
                        <option value="Customer requested reschedule">Customer requested another delivery time</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Reschedule For Date (Optional)</label>
                    <input type="date" name="rescheduled_date" class="form-control" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Additional Notes</label>
                    <textarea name="notes" class="form-control" rows="2" placeholder="Called 3 times, neighbor confirmed customer is out of town..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger fw-bold">Record Issue</button>
            </div>
        </form>
    </div>
</div>
@endsection
