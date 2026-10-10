@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="card-title fw-bold mb-4">Payment Settings</h4>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
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
