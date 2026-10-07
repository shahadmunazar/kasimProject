@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold mb-0">Order Details #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back to Orders</a>
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
                            <th>Qty</th>
                            <th class="text-end">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->product->name ?? 'N/A' }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td class="text-end">₹{{ $order->amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4">Update Order Status</h5>
                <form id="statusForm" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending Verification</option>
                                <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>Approved (Payment Verified)</option>
                                <option value="disapproved" {{ $order->status === 'disapproved' ? 'selected' : '' }}>Disapproved (Payment Invalid)</option>
                                <option value="dispatched" {{ $order->status === 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
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
                <p class="mb-1"><strong>Status:</strong> 
                    <span id="statusBadge">
                        @if($order->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($order->status === 'disapproved')
                            <span class="badge bg-danger">Disapproved</span>
                        @elseif($order->status === 'dispatched')
                            <span class="badge bg-info text-dark">Dispatched</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </span>
                </p>
                <p class="mb-1"><strong>Method:</strong> {{ $order->payment_method }}</p>
                <p class="mb-1"><strong>Transaction ID:</strong> <span class="text-primary font-monospace">{{ $order->transaction_id }}</span></p>
                <p class="mb-1"><strong>UTR Number:</strong> <span class="font-monospace">{{ $order->utr_number }}</span></p>
                <p class="mb-1"><strong>Amount Paid:</strong> ₹{{ $order->payment_amount }}</p>
                <p class="mb-3"><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->payment_date)->format('M d, Y') }}</p>

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
$(document).ready(function() {
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
