@extends('frontend.user.layout')

@section('meta_title', 'Order #' . ($order->order_number ?: $order->id) . ' Details & Tracking | TC Smart Technology')
@section('meta_description', 'View order tracking details, dispatch status, line item pricing, and payment receipt for order #' . ($order->order_number ?: $order->id))
@section('meta_keywords', 'order details, tracking status, order #' . ($order->order_number ?: $order->id) . ', courier tracking, TC Smart Technology')
@section('title', 'Order #' . ($order->order_number ?: $order->id) . ' Details')

@section('dashboard_content')
@php
    $courierName = $order->effective_courier_name;
    $trackingId = $order->effective_tracking_id;
    $trackingUrl = $order->effective_tracking_url;
    $shippedAt = $order->effective_shipped_at;
    $deliveryStatus = $order->effective_delivery_status;
    $statusLabel = $order->delivery_status_label;
    $statusBadge = $order->delivery_status_badge;
    $hasTracking = $order->hasShipmentTracking();

    // Progress Step calculation (1 to 5)
    $stepMap = [
        'processing' => 1,
        'ready_to_ship' => 2,
        'shipped' => 3,
        'in_transit' => 3,
        'out_for_delivery' => 4,
        'delivered' => 5,
        'delivery_failed' => 4,
    ];
    $currentStep = $stepMap[$deliveryStatus] ?? 1;

    // Delivery charge details
    $delCharge = (float)($order->delivery_charge ?? 0);
    $itemSubtotal = (float)$order->amount - $delCharge;
    if ($itemSubtotal < 0) {
        $itemSubtotal = (float)$order->amount;
    }
@endphp

<!-- Custom Page Styles for Aesthetics & Responsive Mobile Design -->
<style>
    .order-details-card {
        border-radius: 18px;
        border: 1px solid #eef2f6;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        background: #ffffff;
        transition: all 0.25s ease;
    }
    .order-subcard {
        border-radius: 14px;
        border: 1px solid #edf2f7;
        background: #ffffff;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .order-subcard:hover {
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.06);
    }
    
    /* Responsive Stepper Styles */
    .stepper-container {
        position: relative;
        padding: 10px 4px;
    }
    .stepper-wrapper {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    .stepper-line {
        position: absolute;
        top: 20px;
        left: 24px;
        right: 24px;
        height: 4px;
        background: #e2e8f0;
        z-index: 1;
        border-radius: 4px;
    }
    .stepper-line-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        border-radius: 4px;
        transition: width 0.5s ease-in-out;
    }
    .stepper-item {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        flex: 1;
        min-width: 0;
    }
    .stepper-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        border: 3px solid #cbd5e1;
        color: #64748b;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .stepper-item.completed .stepper-icon {
        background: #10b981;
        border-color: #10b981;
        color: #ffffff;
    }
    .stepper-item.active .stepper-icon {
        background: #0d6efd;
        border-color: #93c5fd;
        color: #ffffff;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.2);
        animation: stepperPulse 2s infinite;
    }
    .stepper-item.failed .stepper-icon {
        background: #ef4444;
        border-color: #fca5a5;
        color: #ffffff;
    }
    .stepper-title {
        font-size: 12.5px;
        font-weight: 600;
        color: #64748b;
        margin-top: 8px;
        line-height: 1.25;
        word-break: break-word;
    }
    .stepper-item.completed .stepper-title,
    .stepper-item.active .stepper-title {
        color: #0f172a;
        font-weight: 700;
    }

    /* Metric Cards */
    .metric-tile {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 12px;
        padding: 14px 16px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .metric-tile:hover {
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
        transform: translateY(-2px);
    }

    /* Copy Button */
    .copy-btn {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 3px 8px;
        font-size: 11.5px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s ease;
    }
    .copy-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    /* Mobile Product Cards */
    .mobile-product-card {
        border-bottom: 1px solid #edf2f7;
        padding: 14px 0;
    }
    .mobile-product-card:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    /* Thumbnail and Proof Preview */
    .proof-thumbnail-box {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        max-width: 140px;
        transition: transform 0.2s ease;
    }
    .proof-thumbnail-box:hover {
        transform: scale(1.03);
    }
    .proof-thumbnail-box img {
        width: 100%;
        height: 90px;
        object-fit: cover;
        display: block;
    }
    .proof-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.45);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.2s ease;
        font-size: 13px;
        font-weight: 600;
        gap: 4px;
    }
    .proof-thumbnail-box:hover .proof-overlay {
        opacity: 1;
    }

    @keyframes stepperPulse {
        0% { box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.4); }
        70% { box-shadow: 0 0 0 8px rgba(13, 110, 253, 0); }
        100% { box-shadow: 0 0 0 0 rgba(13, 110, 253, 0); }
    }

    /* Responsive Breakpoints */
    @media (max-width: 575.98px) {
        .stepper-icon {
            width: 32px;
            height: 32px;
            font-size: 12px;
            border-width: 2px;
        }
        .stepper-line {
            top: 15px;
            left: 16px;
            right: 16px;
            height: 3px;
        }
        .stepper-title {
            font-size: 10px;
            margin-top: 5px;
        }
        .order-header-actions {
            width: 100%;
            justify-content: flex-start;
        }
        .card-header-badge-wrap {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    }

    @media print {
        body {
            background: #ffffff !important;
            color: #000000 !important;
        }
        .container-fluid, .navbar, .footer, .btn, .breadcrumb, .stepper-container, .user-dashboard-sidebar, .back-to-top {
            display: none !important;
        }
        .col-lg-9, .col-md-8 {
            width: 100% !important;
            max-width: 100% !important;
            flex: 0 0 100% !important;
        }
        .order-details-card {
            box-shadow: none !important;
            border: 1px solid #ccc !important;
        }
    }
</style>

<div class="mb-4">
    <!-- Top Breadcrumb & Quick Actions Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-1 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}" class="text-decoration-none text-muted">
                        <i class="fa fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('frontend.dashboard.orders') }}" class="text-decoration-none text-muted">
                        My Orders
                    </a>
                </li>
                <li class="breadcrumb-item active fw-bold text-primary" aria-current="page">
                    #{{ $order->order_number ?: $order->id }}
                </li>
            </ol>
        </nav>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('frontend.dashboard.orders') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fa fa-arrow-left me-1"></i> Back to Orders
            </a>
            @if($order->isDelivered())
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm rounded-pill px-3 dropdown-toggle shadow-sm" type="button" id="invoiceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-file-invoice me-1"></i> Tax Invoice
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="invoiceDropdown">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('frontend.dashboard.order.invoice', $order->id) }}" target="_blank">
                                <i class="fa fa-eye text-primary me-2"></i> View &amp; Print Invoice
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 fw-semibold text-primary" href="{{ route('frontend.dashboard.order.invoice.pdf', $order->id) }}">
                                <i class="fa fa-file-pdf text-primary me-2"></i> Download PDF Invoice
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Main Order Details Card -->
    <div class="card order-details-card mb-4 overflow-hidden">
        <!-- Order Header Banner -->
        <div class="card-header bg-white p-3 p-md-4 border-bottom">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                        <h4 class="fw-bold mb-0 text-dark">
                            Order <span class="text-primary font-monospace">#{{ $order->order_number ?: $order->id }}</span>
                        </h4>
                        <button type="button" class="copy-btn" title="Copy Order Number" onclick="copyToClipboard('{{ $order->order_number ?: $order->id }}', this)">
                            <i class="fa fa-copy"></i> Copy
                        </button>
                    </div>
                    <div class="text-muted small">
                        <i class="fa fa-calendar-alt me-1"></i> Placed on {{ $order->created_at->format('M d, Y') }} at {{ $order->created_at->format('h:i A') }}
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2 order-header-actions">
                    <!-- Overall Order Status Badge -->
                    @php
                        $orderStatusBadge = match($order->status) {
                            'approved', 'completed', 'delivered' => 'success',
                            'dispatched' => 'primary',
                            'processing', 'packed' => 'info text-dark',
                            'pending' => 'warning text-dark',
                            'cancelled', 'disapproved' => 'danger',
                            default => 'secondary',
                        };
                    @endphp
                    <span class="badge bg-{{ $orderStatusBadge }} fs-6 px-3 py-2 rounded-pill shadow-none">
                        <i class="fa fa-circle small me-1"></i> Order: {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>

                    <!-- Payment Status Badge -->
                    <span class="badge bg-{{ $order->isPaid() ? 'success' : 'warning text-dark' }} fs-6 px-3 py-2 rounded-pill shadow-none">
                        <i class="fa {{ $order->isPaid() ? 'fa-check-circle' : 'fa-clock' }} me-1"></i> {{ $order->isPaid() ? 'Payment Verified' : 'Payment Pending' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="card-body p-3 p-md-4">
            @if($order->isDelivered())
                <!-- Delivered Order Tax Invoice Banner -->
                <div class="alert alert-success border-success-subtle bg-success-subtle rounded-3 p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle p-2 me-3 d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px;">
                            <i class="fa fa-check fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success-emphasis mb-0">Package Successfully Delivered</h6>
                            <small class="text-success-emphasis">Your order was delivered. The official GST Tax Invoice is ready to view, print, or download as PDF.</small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('frontend.dashboard.order.invoice', $order->id) }}" target="_blank" class="btn btn-outline-success btn-sm rounded-pill px-3 fw-semibold">
                            <i class="fa fa-eye me-1"></i> View Invoice
                        </a>
                        <a href="{{ route('frontend.dashboard.order.invoice.pdf', $order->id) }}" class="btn btn-success btn-sm rounded-pill px-3 fw-bold shadow-sm">
                            <i class="fa fa-file-pdf me-1"></i> Download PDF
                        </a>
                    </div>
                </div>
            @endif

            <!-- 1. COURIER DELIVERY TRACKING SECTION -->
            <div class="card order-subcard mb-4 overflow-hidden">
                <div class="card-header bg-light p-3 p-md-4 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-3 p-2 me-3 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px;">
                            <i class="fa fa-truck fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 text-dark">Courier Delivery Tracking</h5>
                            <small class="text-muted">Live fulfillment & carrier dispatch tracking</small>
                        </div>
                    </div>
                    <div>
                        <span class="badge bg-{{ $statusBadge }} fs-6 px-3 py-2 rounded-pill shadow-none">
                            <i class="fa fa-dot-circle me-1"></i> {{ $statusLabel }}
                        </span>
                    </div>
                </div>

                <div class="card-body p-3 p-md-4">
                    @if($hasTracking)
                        <!-- Responsive Visual Stepper -->
                        <div class="stepper-container mb-4">
                            <div class="stepper-wrapper">
                                <div class="stepper-line">
                                    <div class="stepper-line-fill" style="width: {{ (($currentStep - 1) / 4) * 100 }}%;"></div>
                                </div>

                                <!-- Step 1: Processing -->
                                <div class="stepper-item {{ $currentStep > 1 ? 'completed' : ($currentStep === 1 ? 'active' : '') }}">
                                    <div class="stepper-icon">
                                        <i class="fa {{ $currentStep > 1 ? 'fa-check' : 'fa-receipt' }}"></i>
                                    </div>
                                    <div class="stepper-title">Processing</div>
                                </div>

                                <!-- Step 2: Packed -->
                                <div class="stepper-item {{ $currentStep > 2 ? 'completed' : ($currentStep === 2 ? 'active' : '') }}">
                                    <div class="stepper-icon">
                                        <i class="fa {{ $currentStep > 2 ? 'fa-check' : 'fa-box' }}"></i>
                                    </div>
                                    <div class="stepper-title">Packed</div>
                                </div>

                                <!-- Step 3: Shipped / In Transit -->
                                <div class="stepper-item {{ $currentStep > 3 ? 'completed' : ($currentStep === 3 ? 'active' : '') }}">
                                    <div class="stepper-icon">
                                        <i class="fa {{ $currentStep > 3 ? 'fa-check' : 'fa-truck' }}"></i>
                                    </div>
                                    <div class="stepper-title">In Transit</div>
                                </div>

                                <!-- Step 4: Out for Delivery -->
                                <div class="stepper-item {{ $currentStep > 4 ? 'completed' : ($currentStep === 4 ? ($deliveryStatus === 'delivery_failed' ? 'failed' : 'active') : '') }}">
                                    <div class="stepper-icon">
                                        <i class="fa {{ $currentStep > 4 ? 'fa-check' : ($deliveryStatus === 'delivery_failed' ? 'fa-exclamation' : 'fa-shipping-fast') }}"></i>
                                    </div>
                                    <div class="stepper-title">{{ $deliveryStatus === 'delivery_failed' ? 'Failed' : 'Out for Delivery' }}</div>
                                </div>

                                <!-- Step 5: Delivered -->
                                <div class="stepper-item {{ $currentStep >= 5 ? 'completed' : '' }}">
                                    <div class="stepper-icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="stepper-title">Delivered</div>
                                </div>
                            </div>
                        </div>

                        <!-- 4 Courier Shipment Metric Tiles -->
                        <div class="row g-3 mb-4">
                            <!-- Courier Partner -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="metric-tile">
                                    <div>
                                        <div class="text-muted small fw-bold text-uppercase mb-1">
                                            <i class="fa fa-building text-primary me-1"></i> Courier Partner
                                        </div>
                                        <div class="fw-bold text-dark fs-5 text-truncate" title="{{ $courierName }}">
                                            {{ $courierName ?: 'Express Courier' }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-success"><i class="fa fa-shield-alt me-1"></i>Verified Partner</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Tracking ID / AWB Number -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="metric-tile">
                                    <div>
                                        <div class="text-muted small fw-bold text-uppercase mb-1">
                                            <i class="fa fa-barcode text-primary me-1"></i> Tracking ID / AWB
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between gap-1">
                                            <span class="font-monospace fw-bold text-primary fs-5 text-truncate" id="trackingIdText" title="{{ $trackingId }}">
                                                {{ $trackingId }}
                                            </span>
                                            <button type="button" class="copy-btn flex-shrink-0" title="Copy Tracking ID" onclick="copyToClipboard('{{ $trackingId }}', this)">
                                                <i class="fa fa-copy"></i> Copy
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">Waybill tracking number</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipment Date -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="metric-tile">
                                    <div>
                                        <div class="text-muted small fw-bold text-uppercase mb-1">
                                            <i class="fa fa-calendar-day text-primary me-1"></i> Shipment Date
                                        </div>
                                        <div class="fw-bold text-dark fs-5">
                                            {{ $shippedAt ? $shippedAt->format('M d, Y') : 'Dispatched' }}
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted"><i class="fa fa-clock me-1"></i>{{ $shippedAt ? $shippedAt->format('h:i A') : 'Updated' }}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Direct Tracking Button -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="metric-tile justify-content-center text-center p-3">
                                    @if($trackingUrl)
                                        <a href="{{ $trackingUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary fw-bold py-2 shadow-sm d-flex align-items-center justify-content-center">
                                            <i class="fa fa-external-link-alt me-2"></i> Track Your Order
                                        </a>
                                        <small class="text-muted mt-2 d-block" style="font-size: 11px;">
                                            Opens official {{ $courierName }} portal
                                        </small>
                                    @else
                                        <button class="btn btn-secondary fw-bold py-2" disabled>
                                            <i class="fa fa-external-link-alt me-1"></i> Track Your Order
                                        </button>
                                        <small class="text-muted mt-2 d-block" style="font-size: 11px;">Tracking URL Pending</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Manual Update Notice Disclaimer -->
                        <div class="alert alert-light border small text-muted mb-0 d-flex align-items-start rounded-3 bg-light">
                            <i class="fa fa-info-circle text-primary fs-5 me-2 mt-1 flex-shrink-0"></i>
                            <div>
                                <strong>Delivery Status Notice:</strong> Delivery statuses displayed here are updated manually by our fulfillment team based on courier dispatches and may not reflect real-time courier checkpoints instantly. To view live scans directly on <strong>{{ $courierName ?: 'the courier' }}'s</strong> network, click the <strong>Track Your Order</strong> button above.
                            </div>
                        </div>
                    @else
                        <!-- Tracking Pending State -->
                        <div class="py-4 px-2 px-md-3 text-center">
                            <div class="mb-3">
                                <div class="bg-light text-primary rounded-circle d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 72px; height: 72px;">
                                    <i class="fa fa-box-open fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Tracking Details Pending</h5>
                            <p class="text-muted mb-3 mx-auto" style="max-width: 540px;">
                                Your order is currently being prepared at our fulfillment center. Once your package is handed over to our courier partner, the courier name, tracking ID, and direct tracking link will appear here.
                            </p>

                            <!-- Modern 3-Step Preparation Roadmap -->
                            <div class="d-inline-flex flex-wrap justify-content-center gap-2 gap-md-3 mb-4 p-2 bg-light rounded-pill border small">
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="fa fa-check me-1"></i> 1. Order Received
                                </span>
                                <span class="badge bg-primary rounded-pill px-3 py-2">
                                    <i class="fa fa-spinner fa-spin me-1"></i> 2. Fulfillment & Packing
                                </span>
                                <span class="badge bg-secondary rounded-pill px-3 py-2">
                                    <i class="fa fa-truck me-1"></i> 3. Courier Dispatch
                                </span>
                            </div>

                            <div>
                                <button class="btn btn-secondary px-4 py-2 rounded-pill shadow-none" disabled title="Tracking button will become active when package is dispatched">
                                    <i class="fa fa-truck me-2"></i> Track Your Order (Not Yet Available)
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- 2. ADDRESS & PAYMENT INFORMATION (2-COLUMN RESPONSIVE GRID) -->
            <div class="row g-3 g-lg-4 mb-4">
                <!-- Shipping Address Card -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100 order-subcard">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="fw-bold mb-0 text-dark d-flex align-items-center">
                                <span class="bg-primary text-white rounded-circle p-1 me-2 d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 13px;">
                                    <i class="fa fa-map-marker-alt"></i>
                                </span>
                                Shipping Destination
                            </h6>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <h6 class="fw-bold text-dark mb-1 d-flex align-items-center">
                                <i class="fa fa-user text-muted me-2"></i> {{ $order->customer_name }}
                            </h6>
                            <p class="mb-3 text-muted">
                                {{ $order->address }}<br>
                                {{ $order->city }}, {{ $order->state }} - <strong class="text-dark">{{ $order->pincode }}</strong>
                            </p>
                            
                            <div class="pt-3 border-top">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="small text-muted"><i class="fa fa-phone text-muted me-2"></i>Phone:</span>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="tel:{{ $order->mobile }}" class="text-decoration-none text-primary font-monospace fw-bold small">
                                            {{ $order->mobile }}
                                        </a>
                                        <button type="button" class="copy-btn py-0 px-1" title="Copy Phone Number" onclick="copyToClipboard('{{ $order->mobile }}', this)">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                @if($order->email)
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="small text-muted"><i class="fa fa-envelope text-muted me-2"></i>Email:</span>
                                        <a href="mailto:{{ $order->email }}" class="text-decoration-none text-primary small text-truncate" style="max-width: 200px;">
                                            {{ $order->email }}
                                        </a>
                                    </div>
                                @endif
                                @if($order->delivery_distance_km)
                                    <div class="d-flex align-items-center justify-content-between small text-muted">
                                        <span><i class="fa fa-route me-2"></i>Dispatch Distance:</span>
                                        <span class="badge bg-light text-dark border font-monospace">{{ $order->delivery_distance_km }} km</span>
                                    </div>
                                @endif
                            </div>

                            @if($order->expected_delivery_date)
                                <div class="alert alert-success mt-3 mb-0 py-2 small rounded-3 d-flex align-items-center">
                                    <i class="fa fa-calendar-check text-success me-2 fs-5"></i>
                                    <div>
                                        <strong>Expected Delivery:</strong> {{ \Carbon\Carbon::parse($order->expected_delivery_date)->format('M d, Y') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Payment Details Card -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100 order-subcard">
                        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="fw-bold mb-0 text-dark d-flex align-items-center">
                                <span class="bg-success text-white rounded-circle p-1 me-2 d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 13px;">
                                    <i class="fa fa-credit-card"></i>
                                </span>
                                Payment Summary
                            </h6>
                            <span class="badge bg-{{ $order->isPaid() ? 'success' : 'warning text-dark' }} px-3 py-1 rounded-pill">
                                {{ $order->isPaid() ? 'Paid' : 'Pending' }}
                            </span>
                        </div>
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <span class="text-muted small">Payment Method:</span>
                                <span class="fw-bold text-dark small">
                                    <i class="fa {{ $order->payment_method === 'cod' ? 'fa-money-bill-wave text-success' : 'fa-qrcode text-primary' }} me-1"></i>
                                    {{ $order->payment_method === 'cod' ? 'Cash on Delivery (COD)' : 'UPI / QR Code Transfer' }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <span class="text-muted small">Verification Status:</span>
                                <div>
                                    {!! $order->isPaid() 
                                        ? '<span class="text-success fw-bold small"><i class="fa fa-check-circle me-1"></i>Payment Confirmed</span>' 
                                        : '<span class="text-warning fw-bold small"><i class="fa fa-clock me-1"></i>Awaiting Verification</span>' 
                                    !!}
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <span class="text-muted small">Total Order Value:</span>
                                <span class="fw-bold fs-5 text-primary">₹{{ number_format($order->amount, 2) }}</span>
                            </div>

                            @if($order->payment_method === 'QR' || $order->transaction_id || $order->utr_number)
                                <div class="mt-2 pt-1">
                                    @if($order->transaction_id)
                                        <div class="d-flex justify-content-between align-items-center mb-1 small">
                                            <span class="text-muted">Transaction ID:</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <span class="font-monospace fw-bold text-dark text-truncate" style="max-width: 170px;">{{ $order->transaction_id }}</span>
                                                <button type="button" class="copy-btn py-0 px-1" title="Copy Txn ID" onclick="copyToClipboard('{{ $order->transaction_id }}', this)">
                                                    <i class="fa fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->utr_number)
                                        <div class="d-flex justify-content-between align-items-center mb-1 small">
                                            <span class="text-muted">UTR Reference:</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <span class="font-monospace fw-bold text-dark text-truncate" style="max-width: 170px;">{{ $order->utr_number }}</span>
                                                <button type="button" class="copy-btn py-0 px-1" title="Copy UTR" onclick="copyToClipboard('{{ $order->utr_number }}', this)">
                                                    <i class="fa fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->payment_date)
                                        <div class="d-flex justify-content-between align-items-center small text-muted">
                                            <span>Payment Recorded:</span>
                                            <span>{{ \Carbon\Carbon::parse($order->payment_date)->format('M d, Y') }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if($order->payment_screenshot)
                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <span class="small fw-bold text-dark d-block">
                                                <i class="fa fa-receipt text-primary me-1"></i> Payment Proof Slip
                                            </span>
                                            <small class="text-muted" style="font-size: 11px;">Attached payment screenshot</small>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#paymentProofModal">
                                                <i class="fa fa-eye me-1"></i> View Receipt
                                            </button>
                                            <a href="{{ asset('storage/' . $order->payment_screenshot) }}" target="_blank" class="btn btn-light border btn-sm rounded-pill px-2" title="Open full image in new tab">
                                                <i class="fa fa-external-link-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. ITEMS IN THIS ORDER -->
            <div class="card order-subcard overflow-hidden mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-dark d-flex align-items-center">
                        <span class="bg-primary text-white rounded-circle p-1 me-2 d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 13px;">
                            <i class="fa fa-shopping-basket"></i>
                        </span>
                        Items in this Order
                    </h5>
                    <span class="badge bg-light text-dark border">{{ count($orderItems) }} {{ count($orderItems) === 1 ? 'item' : 'items' }}</span>
                </div>
                
                <!-- Desktop & Tablet View (d-none d-md-block) -->
                <div class="d-none d-md-block">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light text-uppercase small fw-bold text-muted">
                                <tr>
                                    <th style="min-width: 280px;" class="ps-4">Product Details</th>
                                    <th class="text-center" style="min-width: 120px;">Unit Price</th>
                                    <th class="text-center" style="min-width: 100px;">Quantity</th>
                                    <th class="text-end pe-4" style="min-width: 140px;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orderItems as $item)
                                    @php
                                        $prod = \App\Models\Product::find($item->product_id);
                                        $imageUrl = null;
                                        if ($prod) {
                                            if (!empty($prod->image)) {
                                                $imageUrl = asset('storage/' . $prod->image);
                                            } elseif (is_array($prod->images) && count($prod->images) > 0) {
                                                $imageUrl = asset('storage/' . $prod->images[0]);
                                            }
                                        }
                                        $unitPrice = (float)$item->price;
                                        $rowTotal = $unitPrice * (int)$item->quantity;
                                    @endphp
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3 flex-shrink-0">
                                                    @if($imageUrl)
                                                        <img src="{{ $imageUrl }}" alt="{{ $prod ? $prod->name : 'Product' }}" class="rounded-3 border" style="width: 58px; height: 58px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded-3 border d-flex align-items-center justify-content-center text-muted" style="width: 58px; height: 58px;">
                                                            <i class="fa fa-cube fa-lg text-secondary"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    @if($prod)
                                                        <a href="{{ route('product.details', $prod->slug) }}" class="fw-bold text-dark text-decoration-none d-block mb-1" target="_blank">
                                                            {{ $prod->name }}
                                                        </a>
                                                        @if($prod->category)
                                                            <span class="badge bg-light text-muted border small">{{ $prod->category->name }}</span>
                                                        @endif
                                                    @else
                                                        <span class="text-muted fw-semibold">Product #{{ $item->product_id }} (Discontinued)</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if($unitPrice > 0)
                                                <span class="fw-semibold">₹{{ number_format($unitPrice, 2) }}</span>
                                            @else
                                                <span class="badge bg-success-subtle text-success border border-success-subtle">FREE</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-light text-dark border px-3 py-1 font-monospace">x{{ $item->quantity }}</span>
                                        </td>
                                        <td class="text-end pe-4 align-middle fw-bold text-dark">
                                            ₹{{ number_format($rowTotal, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            <i class="fa fa-box-open fa-2x mb-2 d-block"></i>
                                            No item lines recorded for this order.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Mobile View Cards (d-md-none) -->
                <div class="d-md-none p-3">
                    @forelse($orderItems as $item)
                        @php
                            $prod = \App\Models\Product::find($item->product_id);
                            $imageUrl = null;
                            if ($prod) {
                                if (!empty($prod->image)) {
                                    $imageUrl = asset('storage/' . $prod->image);
                                } elseif (is_array($prod->images) && count($prod->images) > 0) {
                                    $imageUrl = asset('storage/' . $prod->images[0]);
                                }
                            }
                            $unitPrice = (float)$item->price;
                            $rowTotal = $unitPrice * (int)$item->quantity;
                        @endphp
                        <div class="mobile-product-card">
                            <div class="d-flex align-items-start gap-3">
                                <div class="flex-shrink-0">
                                    @if($imageUrl)
                                        <img src="{{ $imageUrl }}" alt="{{ $prod ? $prod->name : 'Product' }}" class="rounded-3 border" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 border d-flex align-items-center justify-content-center text-muted" style="width: 60px; height: 60px;">
                                            <i class="fa fa-cube fa-lg text-secondary"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    @if($prod)
                                        <a href="{{ route('product.details', $prod->slug) }}" class="fw-bold text-dark text-decoration-none d-block mb-1 text-truncate" target="_blank">
                                            {{ $prod->name }}
                                        </a>
                                        @if($prod->category)
                                            <span class="badge bg-light text-muted border small mb-2">{{ $prod->category->name }}</span>
                                        @endif
                                    @else
                                        <div class="text-muted small fw-semibold mb-2">Product #{{ $item->product_id }}</div>
                                    @endif
                                    
                                    <div class="d-flex align-items-center justify-content-between pt-1">
                                        <div class="small">
                                            <span class="text-muted">Unit:</span>
                                            @if($unitPrice > 0)
                                                <span class="fw-semibold">₹{{ number_format($unitPrice, 2) }}</span>
                                            @else
                                                <span class="badge bg-success-subtle text-success">FREE</span>
                                            @endif
                                            <span class="badge bg-light text-dark border ms-1 font-monospace">x{{ $item->quantity }}</span>
                                        </div>
                                        <div class="fw-bold text-primary">
                                            ₹{{ number_format($rowTotal, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-muted">
                            <i class="fa fa-box-open fa-2x mb-2 d-block"></i>
                            No item lines recorded for this order.
                        </div>
                    @endforelse
                </div>

                <!-- Totals Breakdown Footer (Both Desktop & Mobile) -->
                <div class="bg-light p-3 p-md-4 border-top">
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span class="text-muted">Items Subtotal:</span>
                                <span class="fw-bold text-dark">₹{{ number_format($itemSubtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-1">
                                <span class="text-muted">
                                    Delivery Charge:
                                    @if($order->delivery_distance_km)
                                        <small class="badge bg-white text-muted border font-monospace ms-1">{{ $order->delivery_distance_km }} km</small>
                                    @endif
                                </span>
                                <span>
                                    @if($delCharge > 0)
                                        <span class="fw-bold text-dark">₹{{ number_format($delCharge, 2) }}</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">FREE Delivery</span>
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2 mt-2 border-top">
                                <div>
                                    <span class="fw-bold fs-5 text-dark d-block">Total Payable Amount:</span>
                                    <small class="text-muted" style="font-size: 11px;">Inclusive of all applicable taxes</small>
                                </div>
                                <span class="fw-bold fs-4 text-primary font-monospace">₹{{ number_format($order->amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. FOOTER ACTIONS & SUPPORT -->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top gap-3">
                <div class="text-muted small">
                    <i class="fa fa-headset me-1 text-primary"></i> Need help with this order? 
                    <a href="{{ route('contact.index') }}" class="text-primary text-decoration-none fw-semibold">
                        Contact Customer Support
                    </a>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('frontend.dashboard.orders') }}" class="btn btn-outline-primary btn-sm px-4 rounded-pill">
                        <i class="fa fa-shopping-bag me-1"></i> View All Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Payment Screenshot Preview -->
@if($order->payment_screenshot)
<div class="modal fade" id="paymentProofModal" tabindex="-1" aria-labelledby="paymentProofModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h6 class="modal-title fw-bold" id="paymentProofModalLabel">
                    <i class="fa fa-receipt text-primary me-2"></i> Payment Receipt Slip
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-3 bg-light">
                <img src="{{ asset('storage/' . $order->payment_screenshot) }}" alt="Payment Receipt" class="img-fluid rounded border shadow-sm" style="max-height: 70vh;">
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <small class="text-muted">Uploaded during checkout confirmation</small>
                <div>
                    <a href="{{ asset('storage/' . $order->payment_screenshot) }}" target="_blank" download class="btn btn-primary btn-sm rounded-pill px-3">
                        <i class="fa fa-download me-1"></i> Download Image
                    </a>
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill px-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Copy to Clipboard Javascript Helper -->
<script>
function copyToClipboard(text, btnElement) {
    if (!text) return;
    navigator.clipboard.writeText(text).then(function() {
        const originalHtml = btnElement.innerHTML;
        btnElement.innerHTML = '<i class="fa fa-check text-success"></i> Copied!';
        btnElement.classList.add('bg-white');
        setTimeout(function() {
            btnElement.innerHTML = originalHtml;
            btnElement.classList.remove('bg-white');
        }, 2000);
    }).catch(function() {
        // Fallback prompt
        window.prompt('Copy to clipboard: Ctrl+C, Enter', text);
    });
}
</script>
@endsection
