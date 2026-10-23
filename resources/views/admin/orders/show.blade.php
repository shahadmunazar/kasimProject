@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="card-title fw-bold mb-0">Order Details #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h5>
                    <div class="d-flex align-items-center gap-2">
                        @if(!$order->isDelivered())
                            <form action="{{ route('admin.orders.mark_delivered', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirm delivery of this order? This will manually set the status and delivery status to Delivered and unlock the tax invoice.');">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm shadow-sm">
                                    <i class="ti ti-circle-check me-1"></i> Mark as Delivered
                                </button>
                            </form>
                        @else
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">
                                <i class="ti ti-circle-check me-1"></i> Delivered Confirmed
                            </span>
                        @endif
                        <a href="{{ route('admin.orders.invoice', $order->id) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="ti ti-eye me-1"></i> View Tax Invoice
                        </a>
                        <a href="{{ route('admin.orders.invoice.pdf', $order->id) }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-download me-1"></i> Download PDF Invoice
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="text-muted fw-bold">Customer Information</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-1"><strong>Mobile:</strong> {{ $order->mobile }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->email ?? 'N/A' }}</p>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="text-muted fw-bold">Shipping Address</h6>
                        <p class="mb-1">{{ $order->address }}</p>
                        <p class="mb-1">{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                    </div>
                </div>

                <h6 class="text-muted fw-bold">Product Summary</h6>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-end">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($order->items && $order->items->count() > 0)
                            @foreach($order->items as $oItem)
                                @php
                                    $prod = $oItem->product;
                                    $imageUrl = null;
                                    if ($prod) {
                                        if (!empty($prod->image)) {
                                            $imageUrl = asset('storage/' . $prod->image);
                                        } elseif (is_array($prod->images) && count($prod->images) > 0) {
                                            $imageUrl = asset('storage/' . $prod->images[0]);
                                        } else {
                                            $imageUrl = asset('assets/images/no-image.png');
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        @if($prod)
                                            <a href="{{ route('product.details', $prod->slug) }}" target="_blank" class="text-decoration-none text-dark d-flex align-items-center">
                                                <img src="{{ $imageUrl }}" class="rounded me-3 border" style="width: 50px; height: 50px; object-fit:cover;">
                                                <span class="fw-bold">{{ $prod->name }}</span>
                                            </a>
                                        @else
                                            <span class="text-muted">Product Removed</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">{{ $oItem->quantity }}</td>
                                    <td class="align-middle text-end">₹{{ number_format($oItem->price, 2) }}</td>
                                    <td class="text-end align-middle fw-bold">₹{{ number_format($oItem->price * $oItem->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        @else
                            @php
                                $prod = $order->product;
                                $imageUrl = null;
                                if ($prod) {
                                    if (!empty($prod->image)) {
                                        $imageUrl = asset('storage/' . $prod->image);
                                    } elseif (is_array($prod->images) && count($prod->images) > 0) {
                                        $imageUrl = asset('storage/' . $prod->images[0]);
                                    } else {
                                        $imageUrl = asset('assets/images/no-image.png');
                                    }
                                }
                            @endphp
                            <tr>
                                <td>
                                    @if($prod)
                                        <a href="{{ route('product.details', $prod->slug) }}" target="_blank" class="text-decoration-none text-dark d-flex align-items-center">
                                            <img src="{{ $imageUrl }}" class="rounded me-3 border" style="width: 50px; height: 50px; object-fit:cover;">
                                            <span class="fw-bold">{{ $prod->name }}</span>
                                        </a>
                                    @else
                                        <span class="text-muted">Product Removed</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">{{ $order->quantity }}</td>
                                <td class="align-middle text-end">₹{{ number_format($order->amount - ($order->delivery_charge ?? 0), 2) }}</td>
                                <td class="text-end align-middle fw-bold">₹{{ number_format($order->amount, 2) }}</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-semibold">Delivery Charge:</td>
                            <td class="text-end fw-semibold">{{ ($order->delivery_charge && $order->delivery_charge > 0) ? '₹' . number_format($order->delivery_charge, 2) : 'Free' }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fw-bold fs-5">Grand Total:</td>
                            <td class="text-end fw-bold fs-5 text-primary">₹{{ number_format($order->amount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Manage Delivery / Update Shipment Section -->
        <div class="card shadow-sm border-0 mb-4" id="shipmentManagementCard">
            <div class="card-header bg-white border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div class="d-flex align-items-center">
                    <span class="p-2 bg-light-primary rounded text-primary me-2">
                        <i class="ti ti-truck-delivery fs-5"></i>
                    </span>
                    <div>
                        <h5 class="card-title fw-bold mb-0">Manage Delivery / Update Shipment</h5>
                        <small class="text-muted">Manual courier shipment & delivery tracking (No Shiprocket)</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    @php
                        $effectiveStatus = $order->effective_delivery_status;
                        $statusBadge = $order->delivery_status_badge;
                        $statusLabel = $order->delivery_status_label;
                    @endphp
                    <span class="badge bg-{{ $statusBadge }} px-3 py-2 fs-6">
                        <i class="ti ti-point me-1"></i> {{ $statusLabel }}
                    </span>
                    @if($effectiveStatus !== 'delivered')
                        <form action="{{ route('admin.orders.mark_delivered', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirm manual delivery now?');">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                <i class="ti ti-check me-1"></i> Quick Deliver
                            </button>
                        </form>
                    @endif
                    @if($order->tracking_token)
                        <a href="{{ route('tracking.public', ['token' => $order->tracking_token]) }}" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="ti ti-external-link me-1"></i> Public Tracking Link
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="ti ti-circle-check me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @php
                    $savedCourier = $order->effective_courier_name;
                    $savedTrackingId = $order->effective_tracking_id;
                    $savedTrackingUrl = $order->effective_tracking_url;
                    $savedShippedAt = $order->effective_shipped_at;
                    $hasTracking = !empty($savedTrackingId);
                @endphp

                <!-- Saved Courier Information Display -->
                @if($hasTracking)
                    <div class="border rounded-3 p-3 mb-4 bg-light shadow-none">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                            <div>
                                <span class="badge bg-primary text-uppercase fw-semibold mb-1">Active Courier Shipment</span>
                                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center">
                                    <i class="ti ti-box-seam me-2 text-primary"></i>
                                    {{ $savedCourier ?: 'Courier Dispatched' }}
                                </h5>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-{{ $statusBadge }} fs-6">
                                    {{ $statusLabel }}
                                </span>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <small class="text-muted text-uppercase fw-bold d-block">Courier Partner</small>
                                <span class="fw-bold text-dark fs-6">{{ $savedCourier ?: 'N/A' }}</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted text-uppercase fw-bold d-block">Tracking ID / AWB</small>
                                <div class="d-flex align-items-center">
                                    <span class="font-monospace fw-bold text-primary fs-6 me-2">{{ $savedTrackingId }}</span>
                                    <button type="button" class="btn btn-sm btn-light border py-0 px-2" title="Copy Tracking ID" onclick="navigator.clipboard.writeText('{{ $savedTrackingId }}'); alert('Tracking ID copied!');">
                                        <i class="ti ti-copy small"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted text-uppercase fw-bold d-block">Shipment Date</small>
                                <span class="text-dark fw-semibold">
                                    <i class="ti ti-calendar me-1 text-muted"></i>
                                    {{ $savedShippedAt ? $savedShippedAt->format('M d, Y') : 'Not Recorded' }}
                                </span>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted text-uppercase fw-bold d-block">Courier Official Portal</small>
                                @if($savedTrackingUrl)
                                    <a href="{{ $savedTrackingUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary mt-1">
                                        <i class="ti ti-external-link me-1"></i> Track on {{ $savedCourier ?: 'Courier' }}
                                    </a>
                                @else
                                    <span class="text-muted small">No URL saved</span>
                                @endif
                            </div>
                        </div>

                        @if($savedTrackingUrl)
                            <div class="mt-3 pt-2 border-top">
                                <small class="text-muted fw-bold d-block mb-1">Direct Official Tracking Link:</small>
                                <a href="{{ $savedTrackingUrl }}" target="_blank" rel="noopener noreferrer" class="text-truncate d-inline-block font-monospace small text-decoration-none text-primary" style="max-width: 100%;">
                                    <i class="ti ti-link me-1"></i> {{ $savedTrackingUrl }}
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="alert alert-light border border-warning d-flex align-items-center mb-4 p-3 bg-light-warning">
                        <i class="ti ti-info-circle text-warning fs-3 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">No Shipment Details Added Yet</h6>
                            <p class="text-muted small mb-0">This order does not have courier tracking information yet. Fill out the form below to select the courier, enter the AWB / Tracking ID, and update delivery status.</p>
                        </div>
                    </div>
                @endif

                <!-- Form to Add or Update Shipment Information -->
                <div class="p-3 border rounded-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark mb-0">
                            <i class="ti ti-edit me-1 text-primary"></i>
                            {{ $hasTracking ? 'Edit / Update Shipment Information' : 'Enter Shipment & Delivery Details' }}
                        </h6>
                        <span class="small text-muted">Admin manual delivery update</span>
                    </div>

                    <form action="{{ route('admin.orders.update_shipment', $order->id) }}" method="POST" id="manualShipmentForm" class="row g-3">
                        @csrf

                        <!-- Courier Partner Selection -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Courier Partner <span class="text-danger">*</span></label>
                            @php
                                $standardCouriers = ['Delhivery', 'Blue Dart', 'DTDC', 'India Post', 'DHL', 'FedEx'];
                                $isOther = !empty($savedCourier) && !in_array($savedCourier, $standardCouriers);
                                $selectedCourier = $isOther ? 'Other' : ($savedCourier ?: 'Delhivery');
                            @endphp
                            <select name="courier_partner" id="courierPartnerSelect" class="form-select" required onchange="handleCourierChange()">
                                @foreach($standardCouriers as $cName)
                                    <option value="{{ $cName }}" {{ $selectedCourier === $cName ? 'selected' : '' }}>{{ $cName }}</option>
                                @endforeach
                                <option value="Other" {{ $selectedCourier === 'Other' ? 'selected' : '' }}>Other (Custom Courier)</option>
                            </select>
                        </div>

                        <!-- Custom Courier Name (Only if Other) -->
                        <div class="col-md-4" id="customCourierContainer" style="{{ $selectedCourier === 'Other' ? '' : 'display: none;' }}">
                            <label class="form-label fw-bold">Other Courier Name <span class="text-danger">*</span></label>
                            <input type="text" name="custom_courier_name" id="customCourierInput" class="form-control" placeholder="e.g. Trackon, Professional, Ekart..." value="{{ $isOther ? $savedCourier : '' }}">
                        </div>

                        <!-- Tracking ID / AWB Number -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Courier Tracking ID / AWB Number <span class="text-danger">*</span></label>
                            <input type="text" name="tracking_id" id="trackingIdInput" class="form-control font-monospace" placeholder="e.g. 129482910452" value="{{ $savedTrackingId }}" required oninput="handleTrackingIdInput()">
                            <small class="text-muted">Auto-populates tracking website URL where supported.</small>
                        </div>

                        <!-- Official Tracking Website URL -->
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label fw-bold mb-1">Official Courier Tracking Website URL <span class="text-danger">*</span></label>
                                <a href="javascript:void(0)" class="small text-primary text-decoration-none" onclick="testTrackingUrl()">
                                    <i class="ti ti-external-link"></i> Test Tracking URL
                                </a>
                            </div>
                            <input type="url" name="tracking_url" id="trackingUrlInput" class="form-control font-monospace" placeholder="https://www.delhivery.com/track/package/..." value="{{ $savedTrackingUrl }}" required>
                            <small class="text-muted">Direct tracking link opened when customer clicks "Track Your Order".</small>
                        </div>

                        <!-- Shipment Date -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Shipment Date</label>
                            <input type="date" name="shipped_at" id="shippedAtInput" class="form-control" value="{{ $savedShippedAt ? $savedShippedAt->format('Y-m-d') : date('Y-m-d') }}">
                        </div>

                        <!-- Delivery Status Selection -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Delivery Status <span class="text-danger">*</span></label>
                            <select name="delivery_status" id="deliveryStatusSelect" class="form-select fw-semibold" required>
                                <option value="processing" {{ $effectiveStatus === 'processing' ? 'selected' : '' }}>🟡 Processing</option>
                                <option value="ready_to_ship" {{ $effectiveStatus === 'ready_to_ship' ? 'selected' : '' }}>🔵 Ready to Ship</option>
                                <option value="shipped" {{ $effectiveStatus === 'shipped' ? 'selected' : '' }}>🟣 Shipped</option>
                                <option value="in_transit" {{ $effectiveStatus === 'in_transit' ? 'selected' : '' }}>🚚 In Transit</option>
                                <option value="out_for_delivery" {{ $effectiveStatus === 'out_for_delivery' ? 'selected' : '' }}>📦 Out for Delivery</option>
                                <option value="delivered" {{ $effectiveStatus === 'delivered' ? 'selected' : '' }}>🟢 Delivered</option>
                                <option value="delivery_failed" {{ $effectiveStatus === 'delivery_failed' ? 'selected' : '' }}>🔴 Delivery Failed</option>
                            </select>
                            <small class="text-muted">Customer panel will display this updated status instantly.</small>
                        </div>

                        <!-- Notes -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Shipment Notes (Optional)</label>
                            <input type="text" name="delivery_notes" class="form-control" placeholder="Dispatched via air express, fragile packaging, etc." value="{{ $order->latestShipment->delivery_notes ?? '' }}">
                        </div>

                        <div class="col-12 text-end pt-2">
                            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" id="saveShipmentBtn">
                                <i class="ti ti-device-floppy me-1"></i> Save & Update Shipment Information
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tracking Events Timeline if available -->
                @if($order->latestShipment && $order->latestShipment->events && $order->latestShipment->events->isNotEmpty())
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold mb-3 text-dark"><i class="ti ti-history me-1 text-primary"></i> Shipment Tracking History</h6>
                        <div class="position-relative ps-4 border-start border-2 border-primary ms-2">
                            @foreach($order->latestShipment->events as $ev)
                                <div class="position-relative mb-3 ps-2">
                                    <span class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle border border-white" style="width: 12px; height: 12px; left: -17px !important;"></span>
                                    <div class="fw-bold text-dark text-capitalize small">
                                        {{ str_replace('_', ' ', $ev->status) }}
                                        @if($ev->location)
                                            <span class="text-muted fw-normal">({{ $ev->location }})</span>
                                        @endif
                                        <span class="text-muted fw-normal float-end small">
                                            <i class="ti ti-clock me-1"></i>{{ $ev->event_timestamp ? $ev->event_timestamp->format('M d, Y h:i A') : '' }}
                                        </span>
                                    </div>
                                    <p class="text-muted small mb-0">{{ $ev->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4">Update Order & Payment Status</h5>
                <form id="statusForm" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row align-items-end g-3">
                        <div class="col-md-4">
                            <label class="form-label">Order Status</label>
                            <select name="status" id="orderStatusSelect" class="form-select">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending Verification</option>
                                <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>Approved (Payment Verified)</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="packed" {{ $order->status === 'packed' ? 'selected' : '' }}>Packed</option>
                                <option value="dispatched" {{ $order->status === 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="disapproved" {{ $order->status === 'disapproved' ? 'selected' : '' }}>Disapproved (Restock)</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Restock)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Payment Status</label>
                            <select name="payment_status" class="form-select">
                                <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                                <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                            </select>
                        </div>
                        <div class="col-md-4" id="deliveryDateContainer">
                            <label class="form-label">Expected Delivery Date</label>
                            <input type="date" name="expected_delivery_date" id="expected_delivery_date" class="form-control" value="{{ $order->expected_delivery_date }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" class="form-control" rows="2" placeholder="Internal verification notes...">{{ $order->admin_notes }}</textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title fw-bold mb-0">Payment Details</h5>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Order Status:</strong> 
                    <span class="badge bg-{{ in_array($order->status, ['approved', 'delivered']) ? 'success' : (in_array($order->status, ['disapproved', 'cancelled']) ? 'danger' : 'warning text-dark') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
                <p class="mb-1"><strong>Payment Status:</strong> 
                    <span class="badge bg-{{ $order->payment_status === 'paid' ? 'success' : ($order->payment_status === 'refunded' ? 'info' : 'secondary') }}">
                        {{ ucfirst($order->payment_status ?: 'Pending') }}
                    </span>
                </p>
                <p class="mb-1"><strong>Method:</strong> {{ $order->payment_method }}</p>
                <p class="mb-1"><strong>Transaction ID:</strong> <span class="text-primary font-monospace">{{ $order->transaction_id ?: 'N/A' }}</span></p>
                <p class="mb-1"><strong>UTR Number:</strong> <span class="font-monospace">{{ $order->utr_number ?: 'N/A' }}</span></p>
                <p class="mb-1"><strong>Amount Paid:</strong> ₹{{ $order->payment_amount ?: $order->amount }}</p>
                <p class="mb-3"><strong>Date:</strong> {{ $order->payment_date ? \Carbon\Carbon::parse($order->payment_date)->format('M d, Y') : '—' }}</p>

                <h6 class="fw-bold mt-4">Payment Screenshot</h6>
                @if($order->payment_screenshot)
                    <a href="{{ asset('storage/' . $order->payment_screenshot) }}" target="_blank">
                        <img src="{{ asset('storage/' . $order->payment_screenshot) }}" class="img-fluid rounded border shadow-sm" alt="Payment Screenshot">
                    </a>
                    <div class="text-center mt-2">
                        <small class="text-muted">Click image to view full size</small>
                    </div>
                @else
                    <div class="alert alert-warning">No screenshot uploaded.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const courierUrlTemplates = {
    'Delhivery': 'https://www.delhivery.com/track/package/{TRACKING_ID}',
    'Blue Dart': 'https://www.bluedart.com/web/guest/trackdartresult?trackFor=0&trackNo={TRACKING_ID}',
    'DTDC': 'https://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showTrackingDetail&strCnno={TRACKING_ID}',
    'India Post': 'https://www.indiapost.gov.in/_layouts/15/dop.portal.tracking/trackconsignment.aspx',
    'DHL': 'https://www.dhl.com/in-en/home/tracking/tracking-express.html?submit=1&tracking-id={TRACKING_ID}',
    'FedEx': 'https://www.fedex.com/fedextrack/?trknbr={TRACKING_ID}',
    'Other': ''
};

function handleCourierChange() {
    const courier = $('#courierPartnerSelect').val();
    if (courier === 'Other') {
        $('#customCourierContainer').slideDown();
        $('#customCourierInput').attr('required', true);
    } else {
        $('#customCourierContainer').slideUp();
        $('#customCourierInput').removeAttr('required');
    }
    updateTrackingUrlFromTemplate();
}

function handleTrackingIdInput() {
    updateTrackingUrlFromTemplate();
}

function updateTrackingUrlFromTemplate() {
    const courier = $('#courierPartnerSelect').val();
    const trackingId = $('#trackingIdInput').val().trim();
    if (courier && courierUrlTemplates[courier] && trackingId) {
        const generated = courierUrlTemplates[courier].replace('{TRACKING_ID}', encodeURIComponent(trackingId));
        $('#trackingUrlInput').val(generated);
    }
}

function testTrackingUrl() {
    const url = $('#trackingUrlInput').val().trim();
    if (url && (url.startsWith('http://') || url.startsWith('https://'))) {
        window.open(url, '_blank');
    } else {
        alert('Please enter a valid tracking URL starting with http:// or https://');
    }
}

$(document).ready(function() {
    // If tracking URL is empty on load, attempt autofill
    if (!$('#trackingUrlInput').val().trim()) {
        updateTrackingUrlFromTemplate();
    }
});
</script>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('#orderStatusSelect').on('change', function() {
        if ($(this).val() === 'approved' || $(this).val() === 'dispatched') {
            $('#deliveryDateContainer').slideDown();
            $('#expected_delivery_date').attr('required', true);
        } else {
            $('#deliveryDateContainer').slideUp();
            $('#expected_delivery_date').removeAttr('required');
        }
    });

    $('#statusForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var btn = form.find('button[type="submit"]');
        var originalBtnText = btn.html();
        
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
        
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if(response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    
                    // Update badge dynamically
                    var badgeHtml = '';
                    if(response.status === 'approved') {
                        badgeHtml = '<span class="badge bg-success">Approved</span>';
                    } else if(response.status === 'disapproved') {
                        badgeHtml = '<span class="badge bg-danger">Disapproved</span>';
                    } else if(response.status === 'dispatched') {
                        badgeHtml = '<span class="badge bg-info text-dark">Dispatched</span>';
                    } else {
                        badgeHtml = '<span class="badge bg-warning text-dark">Pending</span>';
                    }
                    $('#statusBadge').html(badgeHtml);
                }
                btn.prop('disabled', false).html(originalBtnText);
            },
            error: function(xhr) {
                var errorMsg = 'Failed to update order status.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Toast.fire({
                    icon: 'error',
                    title: errorMsg
                });
                btn.prop('disabled', false).html(originalBtnText);
            }
        });
    });
});
</script>
@endpush
