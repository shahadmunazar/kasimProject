@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="card-title fw-bold mb-4">Payment Settings</h4>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form id="qrForm" action="{{ route('admin.settings.qr_code') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload UPI QR Code <span class="text-danger">*</span></label>
                        <input type="file" name="qr_code" class="form-control" accept="image/*" required>
                        <small class="text-muted">This QR code will be displayed to customers during checkout.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update QR Code</button>
                </form>
            </div>
            <div class="col-md-6 text-center" id="currentQrCodeContainer">
                <h5 class="fw-semibold">Current QR Code</h5>
                @if($qrCode && $qrCode->value)
                    <div class="p-3 bg-light d-inline-block rounded border mt-2">
                        <img src="{{ asset('storage/' . $qrCode->value) }}" alt="QR Code" class="img-fluid" style="max-height: 250px;">
                    </div>
                @else
                    <div class="p-5 bg-light rounded border text-muted mt-2">
                        <i class="fas fa-qrcode fa-4x mb-3"></i>
                        <p class="mb-0">No QR Code uploaded yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <h4 class="card-title fw-bold mb-4">Delivery Settings</h4>
        
        <form action="{{ route('admin.settings.delivery_charge') }}" method="POST">
            @csrf
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="delivery_charge_enabled" id="delivery_charge_enabled" value="1" {{ ($settings['delivery_charge_enabled'] ?? '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="delivery_charge_enabled">Enable Delivery Charges</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="delivery_distance_enabled" id="delivery_distance_enabled" value="1" {{ ($settings['delivery_distance_enabled'] ?? '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="delivery_distance_enabled">Enable Road-Distance Pricing</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="free_delivery_enabled" id="free_delivery_enabled" value="1" {{ ($settings['free_delivery_enabled'] ?? '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="free_delivery_enabled">Enable Free Delivery rules</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Warehouse Full Address (include PIN Code) <span class="text-danger">*</span></label>
                    <input type="text" name="warehouse_address" class="form-control" value="{{ $settings['warehouse_address'] ?? '110025, India' }}" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Google Maps API Key (Optional)</label>
                    <input type="text" name="google_maps_api_key" class="form-control" value="{{ $settings['google_maps_api_key'] ?? '' }}" placeholder="AIzaSy... (leave blank to use Base Delivery Fee)">
                    <small class="text-muted">Used for road-distance calculation. If not provided or invalid, delivery fee safely defaults to Base Delivery Fee without blocking checkout.</small>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Base Delivery Fee (₹)</label>
                    <input type="number" name="delivery_base_fee" class="form-control" min="0" step="0.01" value="{{ $settings['delivery_base_fee'] ?? '30' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Price Per Km (₹)</label>
                    <input type="number" name="delivery_per_km_fee" class="form-control" min="0" step="0.01" value="{{ $settings['delivery_per_km_fee'] ?? '8' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Max Serviceable Distance (km)</label>
                    <input type="number" name="delivery_max_distance" class="form-control" min="1" step="1" value="{{ $settings['delivery_max_distance'] ?? '100' }}">
                </div>
                
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Minimum Delivery Fee (₹)</label>
                    <input type="number" name="delivery_min_fee" class="form-control" min="0" step="0.01" value="{{ $settings['delivery_min_fee'] ?? '30' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Maximum Delivery Fee (₹)</label>
                    <input type="number" name="delivery_max_fee" class="form-control" min="0" step="0.01" value="{{ $settings['delivery_max_fee'] ?? '300' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Free Delivery Min Order (₹)</label>
                    <input type="number" name="free_delivery_min_order" class="form-control" min="0" step="0.01" value="{{ $settings['free_delivery_min_order'] ?? '1000' }}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Save Delivery Settings</button>
        </form>
    </div>
</div>

<!-- Shiprocket Courier Integration Settings -->
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h4 class="card-title fw-bold mb-1">
                    <i class="ti ti-truck-delivery text-primary me-2"></i> Shiprocket Express Courier Integration
                </h4>
                <p class="text-muted small mb-0">Configure your Shiprocket credentials for automatic consignment booking, AWB tracking, and label generation.</p>
            </div>
            <div>
                @php
                    $srConfigured = !empty($settings['shiprocket_email']) || !empty(env('SHIPROCKET_EMAIL'));
                @endphp
                @if($srConfigured)
                    <span class="badge bg-success px-3 py-2"><i class="ti ti-circle-check me-1"></i> Credentials Connected</span>
                @else
                    <span class="badge bg-warning text-dark px-3 py-2"><i class="ti ti-alert-circle me-1"></i> Pending Credentials (Simulated Mode)</span>
                @endif
            </div>
        </div>

        <form action="{{ route('admin.settings.shiprocket') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="shiprocket_enabled" id="shiprocket_enabled" value="1" {{ ($settings['shiprocket_enabled'] ?? '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="shiprocket_enabled">Enable Shiprocket as active courier option</label>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Shiprocket Account Email <span class="text-danger">*</span></label>
                    <input type="email" name="shiprocket_email" class="form-control" placeholder="your-shiprocket-login@email.com" value="{{ $settings['shiprocket_email'] ?? env('SHIPROCKET_EMAIL', '') }}">
                    <small class="text-muted">The email you use to log in to <a href="https://app.shiprocket.in" target="_blank" class="text-primary">app.shiprocket.in</a>.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Shiprocket Account Password <span class="text-danger">*</span></label>
                    <input type="password" name="shiprocket_password" class="form-control" placeholder="••••••••••••" value="{{ $settings['shiprocket_password'] ?? env('SHIPROCKET_PASSWORD', '') }}">
                    <small class="text-muted">Used to generate API authorization tokens securely.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Pickup Location Nickname <span class="text-danger">*</span></label>
                    <input type="text" name="shiprocket_pickup_location" class="form-control" placeholder="Primary" value="{{ $settings['shiprocket_pickup_location'] ?? env('SHIPROCKET_PICKUP_LOCATION', 'Primary') }}">
                    <small class="text-muted">Must exactly match the <em>Pickup Location</em> name created in your Shiprocket account (default is usually <code>Primary</code>).</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Warehouse Pickup PIN Code <span class="text-danger">*</span></label>
                    <input type="text" name="shiprocket_pickup_pincode" class="form-control" placeholder="110025" value="{{ $settings['shiprocket_pickup_pincode'] ?? env('SHIPROCKET_PICKUP_PINCODE', '110025') }}">
                    <small class="text-muted">PIN code of the fulfillment center from which packages will be picked up.</small>
                </div>
            </div>

            <!-- Webhook URL Box -->
            <div class="p-3 bg-light rounded border mb-4">
                <div class="d-flex align-items-center mb-1">
                    <i class="ti ti-webhook fs-5 text-primary me-2"></i>
                    <strong class="text-dark">Webhook URL for Real-Time Courier Sync</strong>
                </div>
                <p class="small text-muted mb-2">Paste this URL into your <strong>Shiprocket Dashboard &rarr; Settings &rarr; API &rarr; Webhooks</strong> to receive automatic delivery status events:</p>
                <div class="input-group">
                    <input type="text" class="form-control font-monospace bg-white" readonly value="{{ url('/api/webhooks/courier/shiprocket') }}" id="shiprocketWebhookUrl">
                    <button class="btn btn-outline-secondary" type="button" onclick="navigator.clipboard.writeText(document.getElementById('shiprocketWebhookUrl').value); alert('Webhook URL copied to clipboard!');">
                        <i class="ti ti-copy me-1"></i> Copy URL
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy me-1"></i> Save Shiprocket Configuration
            </button>
        </form>
    </div>
</div>

<!-- Tax Invoice & Seller Information Settings Card -->
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <div class="bg-primary-subtle text-primary p-2 rounded-3 me-3 d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                <i class="ti ti-file-invoice fs-4"></i>
            </div>
            <div>
                <h4 class="card-title fw-bold mb-0">Tax Invoice & Seller Settings</h4>
                <small class="text-muted">Configure company legal entity, GSTIN, registered billing address, and default invoice print details.</small>
            </div>
        </div>

        <form action="{{ route('admin.settings.invoice') }}" method="POST">
            @csrf

            <!-- Section 1: Legal Company & Brand Details -->
            <h6 class="fw-bold text-dark text-uppercase small border-bottom pb-2 mb-3 mt-4">
                <i class="ti ti-building me-1 text-primary"></i> 1. Seller Legal Entity &amp; Identifiers
            </h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Company Legal Name <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_company_name" class="form-control" value="{{ $settings['invoice_company_name'] ?? 'TC SMART TECHNOLOGY PRIVATE LIMITED' }}" required>
                    <small class="text-muted">Exact registered legal business entity name.</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Brand / Trade Name</label>
                    <input type="text" name="invoice_brand_name" class="form-control" value="{{ $settings['invoice_brand_name'] ?? 'TC Smart Technology' }}">
                    <small class="text-muted">Public-facing brand name displayed on invoice headers.</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Company GSTIN</label>
                    <input type="text" name="invoice_gstin" class="form-control font-monospace" placeholder="09AAACT9876Q1Z5" value="{{ $settings['invoice_gstin'] ?? '09AAACT9876Q1Z5' }}">
                    <small class="text-muted">15-digit Goods & Services Tax Identification Number.</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Company PAN</label>
                    <input type="text" name="invoice_pan" class="form-control font-monospace" placeholder="AAACT9876Q" value="{{ $settings['invoice_pan'] ?? 'AAACT9876Q' }}">
                    <small class="text-muted">Permanent Account Number.</small>
                </div>
            </div>

            <!-- Section 2: Registered Business Address & Contacts -->
            <h6 class="fw-bold text-dark text-uppercase small border-bottom pb-2 mb-3 mt-4">
                <i class="ti ti-map-pin me-1 text-primary"></i> 2. Registered Office Address &amp; Contact Info
            </h6>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Street / Building Address <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_address" class="form-control" value="{{ $settings['invoice_address'] ?? 'G-194, Sector 63' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_city" class="form-control" value="{{ $settings['invoice_city'] ?? 'Noida' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_state" class="form-control" value="{{ $settings['invoice_state'] ?? 'Uttar Pradesh' }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-semibold">State Code (GST)</label>
                    <input type="text" name="invoice_state_code" class="form-control font-monospace" placeholder="09" value="{{ $settings['invoice_state_code'] ?? '09' }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-semibold">PIN Code <span class="text-danger">*</span></label>
                    <input type="text" name="invoice_pincode" class="form-control" value="{{ $settings['invoice_pincode'] ?? '201301' }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Contact Phone</label>
                    <input type="text" name="invoice_phone" class="form-control" value="{{ $settings['invoice_phone'] ?? '+91 98765 43210' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Billing Email</label>
                    <input type="email" name="invoice_email" class="form-control" value="{{ $settings['invoice_email'] ?? 'support@tcsmarttechnology.com' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Official Website</label>
                    <input type="text" name="invoice_website" class="form-control" value="{{ $settings['invoice_website'] ?? 'www.tcsmarttechnology.com' }}">
                </div>
            </div>

            <!-- Section 3: Tax & Invoice Numbering Formats -->
            <h6 class="fw-bold text-dark text-uppercase small border-bottom pb-2 mb-3 mt-4">
                <i class="ti ti-receipt-tax me-1 text-primary"></i> 3. Numbering, HSN &amp; Tax Configuration
            </h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Invoice Number Prefix</label>
                    <input type="text" name="invoice_prefix" class="form-control font-monospace" placeholder="INV-" value="{{ $settings['invoice_prefix'] ?? 'INV-' }}">
                    <small class="text-muted">Prepended to invoice numbers (e.g. <code>INV-ORD-6ACCC3...</code>).</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Default HSN / SAC Code</label>
                    <input type="text" name="invoice_default_hsn" class="form-control font-monospace" placeholder="8542" value="{{ $settings['invoice_default_hsn'] ?? '8542' }}">
                    <small class="text-muted">Standard Harmonized System code for electronic & IoT items.</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Default GST / Tax Rate (%)</label>
                    <input type="number" step="0.01" min="0" max="100" name="invoice_tax_rate" class="form-control" value="{{ $settings['invoice_tax_rate'] ?? '18' }}">
                    <small class="text-muted">GST rate calculated automatically (split to CGST/SGST or IGST).</small>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Authorized Signatory Name / Title</label>
                    <input type="text" name="invoice_authorized_signatory" class="form-control" value="{{ $settings['invoice_authorized_signatory'] ?? 'For TC SMART TECHNOLOGY PVT LTD - Authorized Signatory' }}">
                </div>
            </div>

            <!-- Section 4: Bank Details for Invoice Payment / Wire Verification -->
            <h6 class="fw-bold text-dark text-uppercase small border-bottom pb-2 mb-3 mt-4">
                <i class="ti ti-building-bank me-1 text-primary"></i> 4. Bank Wire &amp; Digital Payment Details
            </h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Bank Name</label>
                    <input type="text" name="invoice_bank_name" class="form-control" value="{{ $settings['invoice_bank_name'] ?? 'HDFC Bank Ltd' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Account Number</label>
                    <input type="text" name="invoice_bank_account" class="form-control font-monospace" value="{{ $settings['invoice_bank_account'] ?? '50200012345678' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">IFSC Code</label>
                    <input type="text" name="invoice_bank_ifsc" class="form-control font-monospace" value="{{ $settings['invoice_bank_ifsc'] ?? 'HDFC0001234' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Bank Branch</label>
                    <input type="text" name="invoice_bank_branch" class="form-control" value="{{ $settings['invoice_bank_branch'] ?? 'Sector 63, Noida' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">UPI ID</label>
                    <input type="text" name="invoice_upi_id" class="form-control font-monospace" value="{{ $settings['invoice_upi_id'] ?? 'tcsmart@upi' }}">
                </div>
            </div>

            <!-- Section 5: Terms & Conditions -->
            <h6 class="fw-bold text-dark text-uppercase small border-bottom pb-2 mb-3 mt-4">
                <i class="ti ti-notes me-1 text-primary"></i> 5. Invoice Terms, Warranty &amp; Disclaimer
            </h6>
            <div class="mb-4">
                <label class="form-label fw-semibold">Terms &amp; Conditions (Printed on Invoice Footer)</label>
                <textarea name="invoice_terms" class="form-control font-monospace small" rows="4">{{ $settings['invoice_terms'] ?? "1. Goods once sold are covered under standard manufacturer warranty.\n2. All disputes subject to local jurisdiction.\n3. This is a computer generated tax invoice and requires no physical signature." }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2">
                <i class="ti ti-device-floppy me-1"></i> Save Tax Invoice &amp; Seller Settings
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#qrForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var btn = form.find('button[type="submit"]');
        var originalBtnText = btn.html();
        
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
        
        var formData = new FormData(this);
        
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    
                    // Update QR image dynamically if needed
                    if (response.qr_code_url) {
                        $('#currentQrCodeContainer').html('<div class="p-3 bg-light d-inline-block rounded border mt-2"><img src="' + response.qr_code_url + '" alt="QR Code" class="img-fluid" style="max-height: 250px;"></div>');
                    }
                }
                btn.prop('disabled', false).html(originalBtnText);
            },
            error: function(xhr) {
                var errorMsg = 'Failed to update QR Code.';
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
