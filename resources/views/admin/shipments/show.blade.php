@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                Shipment <span class="text-primary font-monospace">{{ $shipment->shipment_number }}</span>
            </h4>
            <p class="text-muted mb-0">Consignment fulfillment, live events timeline, and proof-of-delivery.</p>
        </div>
        <div class="d-flex gap-2">
            @if($shipment->order)
                <a href="{{ route('tracking.public', ['token' => $shipment->order->tracking_token]) }}" target="_blank" class="btn btn-outline-info">
                    <i class="ti ti-external-link me-1"></i> Customer Public Tracking
                </a>
            @endif
            <a href="{{ route('admin.shipments.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left me-1"></i> Back to Shipments
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Shipment Info & Delivery Updates -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title fw-bold mb-0">Carrier & Destination</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted text-uppercase fw-bold">Current Status</small>
                        <div>
                            @if($shipment->status === 'delivered')
                                <span class="badge bg-success fs-6">Delivered</span>
                            @elseif($shipment->status === 'out_for_delivery')
                                <span class="badge bg-info text-dark fs-6">Out for Delivery</span>
                            @elseif($shipment->status === 'in_transit')
                                <span class="badge bg-warning text-dark fs-6">In Transit</span>
                            @elseif($shipment->status === 'shipped')
                                <span class="badge bg-primary fs-6">Shipped / Dispatched</span>
                            @elseif($shipment->status === 'delivery_failed')
                                <span class="badge bg-danger fs-6">Delivery Failed</span>
                            @else
                                <span class="badge bg-secondary fs-6">{{ ucfirst($shipment->status) }}</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase fw-bold">Carrier / Delivery Method</small>
                        <div class="fw-bold fs-6">{{ $shipment->courier_name ?: ($shipment->delivery_type === 'manual' ? 'In-House Staff' : 'Courier') }}</div>
                        @if($shipment->awb_number)
                            <div class="small text-muted font-monospace mt-1">AWB: {{ $shipment->awb_number }}</div>
                        @endif
                        @if($shipment->tracking_url)
                            <a href="{{ $shipment->tracking_url }}" target="_blank" class="small text-primary fw-bold mt-1 d-inline-block">
                                <i class="ti ti-external-link"></i> External Tracking Portal
                            </a>
                        @endif
                    </div>
                    <hr>
                    <div class="mb-3">
                        <small class="text-muted text-uppercase fw-bold">Customer & Shipping Address</small>
                        <div class="fw-bold text-dark">{{ $shipment->order ? $shipment->order->customer_name : 'N/A' }}</div>
                        <div class="small text-muted">{{ $shipment->order ? $shipment->order->address : '' }}</div>
                        <div class="small text-muted">{{ $shipment->order ? $shipment->order->city . ', ' . $shipment->order->state . ' - ' . $shipment->order->pincode : '' }}</div>
                        <div class="small mt-1"><i class="ti ti-phone me-1"></i>{{ $shipment->order ? $shipment->order->mobile : '' }}</div>
                    </div>
                    <hr>
                    <div class="mb-2">
                        <small class="text-muted text-uppercase fw-bold">Fulfillment Origin</small>
                        <div class="small">{{ $shipment->warehouse ? $shipment->warehouse->name : 'Primary Hub' }}</div>
                    </div>
                </div>
            </div>

            <!-- Manual Status Transition Form -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h6 class="card-title fw-bold mb-0">Record Shipment Event</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shipments.status', $shipment->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Update Status to:</label>
                            <select name="status" class="form-select" required>
                                <option value="processing" {{ $shipment->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="ready_to_ship" {{ $shipment->status === 'ready_to_ship' ? 'selected' : '' }}>Ready to Ship</option>
                                <option value="shipped" {{ $shipment->status === 'shipped' ? 'selected' : '' }}>Shipped / Dispatched</option>
                                <option value="in_transit" {{ $shipment->status === 'in_transit' ? 'selected' : '' }}>In Transit</option>
                                <option value="out_for_delivery" {{ $shipment->status === 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                <option value="delivered" {{ $shipment->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="delivery_failed" {{ $shipment->status === 'delivery_failed' ? 'selected' : '' }}>Delivery Failed</option>
                                <option value="return_initiated" {{ $shipment->status === 'return_initiated' ? 'selected' : '' }}>Return Initiated</option>
                                <option value="returned_to_sender" {{ $shipment->status === 'returned_to_sender' ? 'selected' : '' }}>Returned to Sender</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Current Checkpoint / Location</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Bengaluru Central Hub" value="{{ $shipment->order ? $shipment->order->city : '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Event Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="2" required placeholder="Package scanned at sorting center..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Post Tracking Event</button>
                    </form>
                </div>
            </div>

            <!-- Proof of Delivery Card (If Delivered) -->
            @if($shipment->status === 'delivered')
                <div class="card border-0 shadow-sm border-start border-success border-4">
                    <div class="card-body">
                        <h6 class="fw-bold text-success mb-2"><i class="ti ti-circle-check me-1"></i> Delivery Confirmation</h6>
                        <div class="small"><strong>Recipient:</strong> {{ $shipment->recipient_name ?: $shipment->order->customer_name }}</div>
                        <div class="small text-muted"><strong>Timestamp:</strong> {{ $shipment->delivered_at ? $shipment->delivered_at->format('M d, Y h:i A') : 'Confirmed' }}</div>
                        @if($shipment->proof_photo)
                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $shipment->proof_photo) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $shipment->proof_photo) }}" class="img-fluid rounded border" style="max-height: 120px;" alt="Proof of Delivery">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Tracking Timeline & Items -->
        <div class="col-lg-8 mb-4">
            <!-- Consignment Items -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title fw-bold mb-0">Consignment Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Item</th>
                                    <th>SKU</th>
                                    <th class="text-center">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipment->items as $item)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $item->product ? $item->product->name : 'N/A' }}</div>
                                        </td>
                                        <td><span class="font-monospace small">{{ $item->product ? $item->product->sku : '' }}</span></td>
                                        <td class="text-center fw-bold">{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Visual Tracking Timeline -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title fw-bold mb-0">Tracking Events History</h5>
                </div>
                <div class="card-body">
                    @if($shipment->events->isEmpty())
                        <p class="text-muted text-center py-4 mb-0">No tracking events recorded yet.</p>
                    @else
                        <ul class="timeline-widget mb-0 list-unstyled position-relative ps-4 border-start border-2 border-primary ms-2">
                            @foreach($shipment->events as $event)
                                <li class="position-relative mb-4 ps-2">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle p-1 border border-white" style="left: -17px !important;"></span>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h6 class="fw-bold text-dark mb-1 text-capitalize">
                                            {{ str_replace('_', ' ', $event->status) }}
                                            @if($event->location)
                                                <small class="text-muted fw-normal">({{ $event->location }})</small>
                                            @endif
                                        </h6>
                                        <small class="text-muted">{{ $event->event_timestamp ? $event->event_timestamp->format('M d, Y h:i A') : '' }}</small>
                                    </div>
                                    <p class="text-muted small mb-0">{{ $event->description }}</p>
                                    <small class="badge bg-light text-secondary border font-monospace mt-1">Source: {{ $event->source }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Delivery Attempts Log -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold mb-0">Delivery Attempts Log</h5>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#attemptModal">
                        <i class="ti ti-plus me-1"></i> Log Attempt
                    </button>
                </div>
                <div class="card-body">
                    @if($shipment->attempts->isEmpty())
                        <p class="text-muted text-center py-3 mb-0">No delivery attempts recorded yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Attempt #</th>
                                        <th>Status</th>
                                        <th>Timestamp</th>
                                        <th>Reason / Details</th>
                                        <th>Attempted By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shipment->attempts as $att)
                                        <tr>
                                            <td class="fw-bold">#{{ $att->attempt_number }}</td>
                                            <td>
                                                @if($att->status === 'delivered')
                                                    <span class="badge bg-success">Successful</span>
                                                @elseif($att->status === 'rescheduled')
                                                    <span class="badge bg-warning text-dark">Rescheduled</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td><small>{{ $att->attempted_at ? $att->attempted_at->format('M d, Y h:i A') : '' }}</small></td>
                                            <td>
                                                <div>{{ $att->failure_reason ?: ($att->recipient_name ? "Received by {$att->recipient_name}" : 'Attempt recorded') }}</div>
                                                @if($att->notes)
                                                    <small class="text-muted">{{ $att->notes }}</small>
                                                @endif
                                            </td>
                                            <td><small>{{ $att->attemptedBy ? $att->attemptedBy->name : 'Staff' }}</small></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Log Attempt Modal -->
<div class="modal fade" id="attemptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.shipments.attempt', $shipment->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Log Delivery Attempt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Attempt Result <span class="text-danger">*</span></label>
                    <select name="status" id="attemptResultSelect" class="form-select" required onchange="toggleAttemptFields(this.value)">
                        <option value="delivered">Delivered Successfully (Recipient Signed)</option>
                        <option value="failed">Failed / Customer Unavailable</option>
                        <option value="rescheduled">Rescheduled for Another Date</option>
                    </select>
                </div>
                <div class="mb-3" id="recipientNameField">
                    <label class="form-label">Recipient Name</label>
                    <input type="text" name="recipient_name" class="form-control" value="{{ $shipment->order ? $shipment->order->customer_name : '' }}">
                </div>
                <div class="mb-3" id="failureReasonField" style="display: none;">
                    <label class="form-label">Reason for Failure</label>
                    <select name="failure_reason" class="form-select">
                        <option value="Customer unavailable">Customer unavailable / Premises closed</option>
                        <option value="Wrong delivery address">Wrong / Incomplete address</option>
                        <option value="Customer refused delivery">Customer refused delivery</option>
                        <option value="Payment / COD collection issue">Payment / Verification issue</option>
                    </select>
                </div>
                <div class="mb-3" id="rescheduledDateField" style="display: none;">
                    <label class="form-label">Reschedule Delivery Date</label>
                    <input type="date" name="rescheduled_date" class="form-control" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Proof of Delivery Photo (Optional)</label>
                    <input type="file" name="proof_photo" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="2" placeholder="Gatekeeper delivered, neighbor, or remarks..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Attempt Log</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleAttemptFields(val) {
    if (val === 'delivered') {
        $('#recipientNameField').show();
        $('#failureReasonField').hide();
        $('#rescheduledDateField').hide();
    } else if (val === 'failed') {
        $('#recipientNameField').hide();
        $('#failureReasonField').show();
        $('#rescheduledDateField').hide();
    } else if (val === 'rescheduled') {
        $('#recipientNameField').hide();
        $('#failureReasonField').show();
        $('#rescheduledDateField').show();
    }
}
</script>
@endpush
