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
