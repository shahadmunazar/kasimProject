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
                                <select class="form-select form-select-sm status-select fw-semibold" data-id="{{ $order->id }}" style="width: 140px;">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $order->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="packed" {{ $order->status === 'packed' ? 'selected' : '' }}>Packed</option>
                                    <option value="dispatched" {{ $order->status === 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="disapproved" {{ $order->status === 'disapproved' ? 'selected' : '' }}>Disapproved</option>
                                </select>
                                <span class="status-indicator ms-2" style="display: none;"><i class="fas fa-spinner fa-spin text-primary"></i></span>

                                @if(!$order->isDelivered())
                                    <div class="mt-1 mark-delivered-container-{{ $order->id }}">
                                        <button type="button" 
                                                class="btn btn-xs btn-outline-success mark-delivered-btn py-0 px-2 fw-semibold" 
                                                style="font-size: 11px;"
                                                data-id="{{ $order->id }}"
                                                title="Manually mark delivered immediately">
                                            <i class="ti ti-check me-1"></i>Mark Delivered
                                        </button>
                                    </div>
                                @endif

                                <div class="mt-1 delivery-status-box" id="delivery-status-box-{{ $order->id }}">
                                    <span class="badge bg-{{ $order->delivery_status_badge }} text-uppercase" style="font-size: 10px;">
                                        {{ $order->delivery_status_label }}
                                    </span>
                                    @if($order->hasShipmentTracking())
                                        <div class="text-muted font-monospace" style="font-size: 11px;">
                                            {{ $order->effective_courier_name }}: {{ $order->effective_tracking_id }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.orders.invoice.pdf', $order->id) }}" class="btn btn-sm btn-outline-secondary" title="Download Tax Invoice PDF">
                                        <i class="ti ti-file-invoice"></i>
                                    </a>
                                </div>
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
                    select.data('original', newStatus);
                    if (newStatus === 'delivered') {
                        $('#delivery-status-box-' + orderId).html('<span class="badge bg-success text-uppercase" style="font-size: 10px;">Delivered</span>');
                        $('.mark-delivered-container-' + orderId).remove();
                    }
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
                select.val(originalValue);
                select.prop('disabled', false);
                indicator.hide();
            }
        });
    });

    // One-click manual mark delivered
    $(document).on('click', '.mark-delivered-btn', function() {
        var btn = $(this);
        var orderId = btn.data('id');
        if (!confirm('Are you sure you want to manually mark this order as Delivered?')) {
            return;
        }
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');

        $.ajax({
            url: "{{ url('admin/orders') }}/" + orderId + "/mark-delivered",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    var select = $('select.status-select[data-id="' + orderId + '"]');
                    select.val('delivered').data('original', 'delivered');
                    $('#delivery-status-box-' + orderId).html('<span class="badge bg-success text-uppercase" style="font-size: 10px;">Delivered</span>');
                    btn.closest('.mark-delivered-container-' + orderId).remove();
                }
            },
            error: function(xhr) {
                var errorMsg = 'Failed to mark order as delivered.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Toast.fire({
                    icon: 'error',
                    title: errorMsg
                });
                btn.prop('disabled', false).html('<i class="ti ti-check me-1"></i>Mark Delivered');
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
