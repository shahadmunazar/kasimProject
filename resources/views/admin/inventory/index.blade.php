@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Inventory Management</h4>
            <p class="text-muted mb-0">Track real-time stock levels, valuations, and low-stock warnings across warehouses.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.inventory.export') }}" class="btn btn-outline-success">
                <i class="ti ti-download me-1"></i> Export CSV
            </a>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="ti ti-upload me-1"></i> Import CSV
            </button>
            <button type="button" class="btn btn-primary" onclick="openAdjustModal()">
                <i class="ti ti-adjustments me-1"></i> Quick Stock Adjust
            </button>
        </div>
    </div>

    <!-- Inventory Metrics Row -->
    <div class="row mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-primary text-primary rounded-3 p-3 me-3">
                            <i class="ti ti-box fs-6"></i>
                        </div>
                        <div>
                            <span class="text-muted small fw-bold">TOTAL STOCK</span>
                            <h4 class="fw-bold mb-0 text-dark">{{ number_format($summary['total_stock']) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-success text-success rounded-3 p-3 me-3">
                            <i class="ti ti-currency-rupee fs-6"></i>
                        </div>
                        <div>
                            <span class="text-muted small fw-bold">STOCK VALUATION</span>
                            <h4 class="fw-bold mb-0 text-dark">₹{{ number_format($summary['total_valuation'], 2) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-warning text-warning rounded-3 p-3 me-3">
                            <i class="ti ti-alert-triangle fs-6"></i>
                        </div>
                        <div>
                            <span class="text-muted small fw-bold">LOW STOCK ITEMS</span>
                            <h4 class="fw-bold mb-0 text-warning">{{ $summary['low_stock_count'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-light-danger text-danger rounded-3 p-3 me-3">
                            <i class="ti ti-circle-x fs-6"></i>
                        </div>
                        <div>
                            <span class="text-muted small fw-bold">OUT OF STOCK</span>
                            <h4 class="fw-bold mb-0 text-danger">{{ $summary['out_of_stock_count'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.inventory.index') }}" class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by name, SKU, or barcode..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="filter" class="form-select">
                        <option value="">All Stock Levels</option>
                        <option value="low" {{ request('filter') === 'low' ? 'selected' : '' }}>Low Stock (≤ Reorder Level)</option>
                        <option value="out" {{ request('filter') === 'out' ? 'selected' : '' }}>Out of Stock (= 0)</option>
                        <option value="in" {{ request('filter') === 'in' ? 'selected' : '' }}>In Stock (> Reorder Level)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="ti ti-search"></i> Filter</button>
                    @if(request()->hasAny(['search', 'filter', 'category_id']))
                        <a href="{{ route('admin.inventory.index') }}" class="btn btn-outline-secondary"><i class="ti ti-x"></i></a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>SKU / Barcode</th>
                            <th>Cost / Price</th>
                            <th class="text-center">On Hand</th>
                            <th class="text-center">Reserved</th>
                            <th class="text-center">Available</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $prod)
                            @php
                                $imageUrl = !empty($prod->image) 
                                    ? asset('storage/' . $prod->image) 
                                    : (is_array($prod->images) && count($prod->images) > 0 ? asset('storage/' . $prod->images[0]) : asset('assets/images/no-image.png'));
                                $available = $prod->availableStock();
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $imageUrl }}" class="rounded me-3 border" style="width: 45px; height: 45px; object-fit: cover;">
                                        <div>
                                            <div class="fw-bold text-dark">{{ $prod->name }}</div>
                                            <small class="text-muted">{{ $prod->category ? $prod->category->name : 'Uncategorized' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace">{{ $prod->sku }}</span>
                                    @if($prod->barcode)
                                        <div class="small text-muted font-monospace mt-1"><i class="ti ti-barcode"></i> {{ $prod->barcode }}</div>
                                    @endif
                                </td>
                                <td>
                                    <div><strong>Sell:</strong> ₹{{ number_format($prod->effectivePrice(), 2) }}</div>
                                    <div class="small text-muted"><strong>Cost:</strong> ₹{{ number_format($prod->cost_price ?: $prod->price * 0.7, 2) }}</div>
                                </td>
                                <td class="text-center fw-bold fs-5">{{ $prod->stock_quantity }}</td>
                                <td class="text-center text-muted">
                                    {{ max(0, $prod->stock_quantity - $available) }}
                                </td>
                                <td class="text-center fw-bold text-primary fs-5">{{ $available }}</td>
                                <td>
                                    @if($prod->isOutOfStock())
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @elseif($prod->isLowStock())
                                        <span class="badge bg-warning text-dark">Low Stock (≤ {{ $prod->low_stock_threshold }})</span>
                                    @else
                                        <span class="badge bg-success">In Stock</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" 
                                            onclick="openAdjustModal({{ $prod->id }}, '{{ addslashes($prod->name) }}', {{ $prod->stock_quantity }})">
                                        <i class="ti ti-adjustments me-1"></i> Adjust
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No inventory records matching your query.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Stock Adjustment Modal -->
<div class="modal fade" id="adjustModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.inventory.adjust') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="adjustModalTitle">Adjust Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="product_id" id="modalProductId">
                
                <div class="mb-3" id="productSelectContainer">
                    <label class="form-label">Product <span class="text-danger">*</span></label>
                    <select id="modalProductSelect" class="form-select" onchange="document.getElementById('modalProductId').value = this.value">
                        <option value="">Select Product</option>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} (SKU: {{ $p->sku }}, Current Stock: {{ $p->stock_quantity }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Warehouse <span class="text-danger">*</span></label>
                    <select name="warehouse_id" class="form-select" required>
                        @foreach($warehouses as $wh)
                            <option value="{{ $wh->id }}" {{ $wh->is_default ? 'selected' : '' }}>
                                {{ $wh->name }} ({{ $wh->code }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Stock Quantity <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="quantity" id="modalNewQuantity" class="form-control" required placeholder="Enter absolute target stock count">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adjustment Reason / Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-select" required>
                        <option value="manual_adjustment">Physical Inventory Audit Correction</option>
                        <option value="damaged">Damaged / Expired Goods Write-off</option>
                        <option value="purchase_receipt">Direct Stock-In / Shipment Receipt</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes & Justification <span class="text-danger">*</span></label>
                    <textarea name="reason" class="form-control" rows="2" required placeholder="Provide reason for adjustment (e.g. Physical inventory count verified by auditor)"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Adjustment</button>
            </div>
        </form>
    </div>
</div>

<!-- CSV Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.inventory.import') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Import Inventory Stock CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info py-2 small">
                    <i class="ti ti-info-circle me-1"></i> CSV columns must be: <strong>[SKU or Product ID, New Stock Quantity, Optional Cost Price]</strong>
                </div>

                <div class="mb-3">
                    <label class="form-label">Target Warehouse <span class="text-danger">*</span></label>
                    <select name="warehouse_id" class="form-select" required>
                        @foreach($warehouses as $wh)
                            <option value="{{ $wh->id }}" {{ $wh->is_default ? 'selected' : '' }}>{{ $wh->name }} ({{ $wh->code }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">CSV File <span class="text-danger">*</span></label>
                    <input type="file" name="csv_file" class="form-control" accept=".csv" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Upload & Reconcile</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openAdjustModal(productId = null, productName = '', currentStock = 0) {
    if (productId) {
        $('#modalProductId').val(productId);
        $('#modalNewQuantity').val(currentStock);
        $('#productSelectContainer').hide();
        $('#adjustModalTitle').text('Adjust Stock for: ' + productName);
    } else {
        $('#modalProductId').val('');
        $('#modalNewQuantity').val('');
        $('#productSelectContainer').show();
        $('#adjustModalTitle').text('Quick Stock Adjust');
    }
    new bootstrap.Modal(document.getElementById('adjustModal')).show();
}
</script>
@endpush
