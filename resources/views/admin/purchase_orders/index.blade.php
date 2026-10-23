@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Purchase Orders (Procurement)</h4>
            <p class="text-muted mb-0">Create purchase orders to vendors. Inventory increases only upon verified physical goods receipt.</p>
        </div>
        <button type="button" class="btn btn-primary" onclick="openCreatePoModal()">
            <i class="ti ti-plus me-1"></i> Create Purchase Order
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>PO Number</th>
                            <th>Supplier</th>
                            <th>Destination Hub</th>
                            <th>Order Date</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($purchaseOrders as $po)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.purchase_orders.show', $po->id) }}" class="fw-bold text-primary font-monospace">
                                        {{ $po->po_number }}
                                    </a>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $po->supplier ? $po->supplier->name : 'N/A' }}</div>
                                    <small class="text-muted">{{ $po->supplier ? $po->supplier->contact_person : '' }}</small>
                                </td>
                                <td>{{ $po->warehouse ? $po->warehouse->name : 'N/A' }}</td>
                                <td>{{ $po->order_date ? \Carbon\Carbon::parse($po->order_date)->format('M d, Y') : '—' }}</td>
                                <td class="fw-bold text-dark">₹{{ number_format($po->total_amount, 2) }}</td>
                                <td>
                                    @if($po->status === 'received')
                                        <span class="badge bg-success">Fully Received</span>
                                    @elseif($po->status === 'partial')
                                        <span class="badge bg-warning text-dark">Partially Received</span>
                                    @elseif($po->status === 'ordered')
                                        <span class="badge bg-info text-dark">Ordered</span>
                                    @elseif($po->status === 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.purchase_orders.show', $po->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye me-1"></i> View / Receive
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No purchase orders found. Click "Create Purchase Order" to procure inventory.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $purchaseOrders->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Create Purchase Order Modal -->
<div class="modal fade" id="createPoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="POST" action="{{ route('admin.purchase_orders.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Create Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Supplier <span class="text-danger">*</span></label>
                        <select name="supplier_id" class="form-select" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $s)
                                <option value="{{ $s->id }}">{{ $s->name }} ({{ $s->company_name ?: 'Vendor' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Destination Warehouse <span class="text-danger">*</span></label>
                        <select name="warehouse_id" class="form-select" required>
                            @foreach($warehouses as $wh)
                                <option value="{{ $wh->id }}" {{ $wh->is_default ? 'selected' : '' }}>{{ $wh->name }} ({{ $wh->code }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order Date <span class="text-danger">*</span></label>
                        <input type="date" name="order_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Expected Date</label>
                        <input type="date" name="expected_delivery_date" class="form-control">
                    </div>
                </div>

                <h6 class="fw-bold border-bottom pb-2 mb-3">Order Items</h6>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle" id="poItemsTable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 45%;">Product <span class="text-danger">*</span></th>
                                <th style="width: 20%;">Quantity <span class="text-danger">*</span></th>
                                <th style="width: 25%;">Unit Cost (₹) <span class="text-danger">*</span></th>
                                <th style="width: 10%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="poItemsBody">
                            <tr class="po-item-row">
                                <td>
                                    <select name="items[0][product_id]" class="form-select po-product-select" required onchange="updateProductCost(this)">
                                        <option value="">Select Product</option>
                                        @foreach($products as $p)
                                            <option value="{{ $p->id }}" data-cost="{{ $p->cost_price ?: ($p->price * 0.7) }}">
                                                {{ $p->name }} (SKU: {{ $p->sku }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" min="1" name="items[0][quantity]" class="form-control" value="10" required>
                                </td>
                                <td>
                                    <input type="number" step="0.01" min="0" name="items[0][unit_cost]" class="form-control po-cost-input" value="0" required>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removePoRow(this)"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPoRow()">
                        <i class="ti ti-plus me-1"></i> Add Another Item
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes / Instructions</label>
                    <textarea name="notes" class="form-control" rows="2" placeholder="Purchase specifications, batch numbers, or terms..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create & Issue PO</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
let poRowIndex = 1;

function openCreatePoModal() {
    new bootstrap.Modal(document.getElementById('createPoModal')).show();
}

function updateProductCost(selectElem) {
    const cost = $(selectElem).find(':selected').data('cost') || 0;
    $(selectElem).closest('tr').find('.po-cost-input').val(parseFloat(cost).toFixed(2));
}

function addPoRow() {
    const firstRowOptions = $('.po-product-select').first().html();
    const newRow = `
        <tr class="po-item-row">
            <td>
                <select name="items[${poRowIndex}][product_id]" class="form-select po-product-select" required onchange="updateProductCost(this)">
                    ${firstRowOptions}
                </select>
            </td>
            <td>
                <input type="number" min="1" name="items[${poRowIndex}][quantity]" class="form-control" value="10" required>
            </td>
            <td>
                <input type="number" step="0.01" min="0" name="items[${poRowIndex}][unit_cost]" class="form-control po-cost-input" value="0" required>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removePoRow(this)"><i class="ti ti-trash"></i></button>
            </td>
        </tr>
    `;
    $('#poItemsBody').append(newRow);
    poRowIndex++;
}

function removePoRow(btn) {
    if ($('.po-item-row').length > 1) {
        $(btn).closest('tr').remove();
    } else {
        alert('At least one item is required in a purchase order.');
    }
}
</script>
@endpush
