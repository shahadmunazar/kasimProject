@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="card-title fw-bold mb-4">Orders</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order ID & Date</th>
                        <th>Customer</th>
                        <th>Product Info</th>
                        <th>Payment Details</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                            <td>
                                <span class="text-primary fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span><br>
                                <small class="text-muted">{{ $order->created_at->format('M d, Y h:i A') }}</small>
                            </td>
                            <td>
                                <strong>{{ $order->customer_name }}</strong><br>
                                <small class="text-muted">{{ $order->mobile }}</small>
                            </td>
                            <td>
                                {{ $order->product->name ?? 'N/A' }}<br>
                                <small class="text-muted">Qty: {{ $order->quantity }} | Total: ₹{{ $order->amount }}</small>
                            </td>
                            <td>
                                <small>
                                    <strong>Txn:</strong> {{ $order->transaction_id }}<br>
                                    <strong>UTR:</strong> {{ $order->utr_number }}<br>
                                    <strong>Paid:</strong> ₹{{ $order->payment_amount }}<br>
                                    @if($order->payment_screenshot)
                                        <a href="{{ asset('storage/' . $order->payment_screenshot) }}" target="_blank" class="text-info">View Screenshot</a>
                                    @endif
                                </small>
                            </td>
                            <td>
                                <select class="form-select form-select-sm status-select" data-id="{{ $order->id }}" style="width: 130px;">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="disapproved" {{ $order->status === 'disapproved' ? 'selected' : '' }}>Disapproved</option>
                                    <option value="dispatched" {{ $order->status === 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                                </select>
                                <span class="status-indicator ms-2" style="display: none;"><i class="fas fa-spinner fa-spin text-primary"></i></span>
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.status-select').on('change', function() {
        var select = $(this);
        var orderId = select.data('id');
        var newStatus = select.val();
        var indicator = select.siblings('.status-indicator');
        var originalValue = select.data('original') || select.find('option[selected]').val();
        
        select.prop('disabled', true);
        indicator.show();
        
        $.ajax({
            url: "{{ url('admin/orders') }}/" + orderId,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                _method: "PUT",
                status: newStatus
            },
            success: function(response) {
                if(response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    select.data('original', newStatus); // Update original value on success
                }
                select.prop('disabled', false);
                indicator.hide();
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
                select.val(originalValue); // Revert on error
                select.prop('disabled', false);
                indicator.hide();
            }
        });
    });
    
    // Store initial values
    $('.status-select').each(function() {
        $(this).data('original', $(this).val());
    });
});
</script>
@endpush
