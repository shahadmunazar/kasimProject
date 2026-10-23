@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Warehouse & Hub Locations</h4>
            <p class="text-muted mb-0">Manage fulfillment centers, dispatch hubs, and multi-location inventory.</p>
        </div>
        <button type="button" class="btn btn-primary" onclick="openWarehouseModal()">
            <i class="ti ti-plus me-1"></i> Add Warehouse
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Hub Code</th>
                            <th>Warehouse Name</th>
                            <th>Contact Person</th>
                            <th>Phone & Email</th>
                            <th>City / State</th>
                            <th>Stock Items</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($warehouses as $wh)
                            <tr>
                                <td>
                                    <span class="badge bg-dark font-monospace">{{ $wh->code }}</span>
                                    @if($wh->is_default)
                                        <span class="badge bg-primary ms-1">Primary Hub</span>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $wh->name }}</td>
                                <td>{{ $wh->contact_name ?: '—' }}</td>
                                <td>
                                    <div><small>{{ $wh->phone ?: '—' }}</small></div>
                                    <small class="text-muted">{{ $wh->email ?: '—' }}</small>
                                </td>
                                <td>
                                    <div>{{ $wh->city ?: '—' }}</div>
                                    <small class="text-muted">{{ $wh->state }} {{ $wh->pincode ? "({$wh->pincode})" : '' }}</small>
                                </td>
                                <td class="fw-bold">{{ $wh->stocks_count }} SKUs</td>
                                <td>
                                    @if($wh->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" 
                                            onclick='editWarehouse(@json($wh))'>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                    @if(!$wh->is_default)
                                        <form action="{{ route('admin.warehouses.destroy', $wh->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this warehouse?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No warehouses registered.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Warehouse Modal -->
<div class="modal fade" id="warehouseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="warehouseForm" class="modal-content">
            @csrf
            <input type="hidden" name="_method" id="whMethod" value="POST">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="whModalTitle">Add New Warehouse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Warehouse Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="whName" class="form-control" required placeholder="e.g. South Regional Hub">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Warehouse Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" id="whCode" class="form-control" required placeholder="e.g. WH-BLR-02">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Contact Person</label>
                        <input type="text" name="contact_name" id="whContact" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" id="whPhone" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="whEmail" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" id="whAddress" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">City</label>
                        <input type="text" name="city" id="whCity" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <input type="text" name="state" id="whState" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pincode</label>
                        <input type="text" name="pincode" id="whPincode" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" id="whActive" checked>
                            <label class="form-check-label" for="whActive">Active Warehouse</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_default" id="whDefault">
                            <label class="form-check-label" for="whDefault">Set as Primary Default Hub</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="whSubmitBtn">Save Warehouse</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openWarehouseModal() {
    $('#warehouseForm').attr('action', "{{ route('admin.warehouses.store') }}");
    $('#whMethod').val('POST');
    $('#whModalTitle').text('Add New Warehouse');
    $('#warehouseForm')[0].reset();
    $('#whActive').prop('checked', true);
    new bootstrap.Modal(document.getElementById('warehouseModal')).show();
}

function editWarehouse(wh) {
    $('#warehouseForm').attr('action', '/admin/warehouses/' + wh.id);
    $('#whMethod').val('PUT');
    $('#whModalTitle').text('Edit Warehouse: ' + wh.name);
    $('#whName').val(wh.name);
    $('#whCode').val(wh.code);
    $('#whContact').val(wh.contact_name);
    $('#whPhone').val(wh.phone);
    $('#whEmail').val(wh.email);
    $('#whAddress').val(wh.address);
    $('#whCity').val(wh.city);
    $('#whState').val(wh.state);
    $('#whPincode').val(wh.pincode);
    $('#whActive').prop('checked', wh.is_active);
    $('#whDefault').prop('checked', wh.is_default);
    new bootstrap.Modal(document.getElementById('warehouseModal')).show();
}
</script>
@endpush
