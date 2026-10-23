@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Supplier & Vendor Management</h4>
            <p class="text-muted mb-0">Maintain verified suppliers, procurement contacts, and GST credentials.</p>
        </div>
        <button type="button" class="btn btn-primary" onclick="openSupplierModal()">
            <i class="ti ti-plus me-1"></i> Add Supplier
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
                            <th>Supplier / Company</th>
                            <th>Contact Person</th>
                            <th>Phone & Email</th>
                            <th>GST Number</th>
                            <th>Location</th>
                            <th>Purchase Orders</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $sup)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $sup->name }}</div>
                                    @if($sup->company_name)
                                        <small class="text-muted">{{ $sup->company_name }}</small>
                                    @endif
                                </td>
                                <td>{{ $sup->contact_person ?: '—' }}</td>
                                <td>
                                    <div><small>{{ $sup->phone ?: '—' }}</small></div>
                                    <small class="text-muted">{{ $sup->email ?: '—' }}</small>
                                </td>
                                <td><span class="font-monospace small">{{ $sup->gst_number ?: '—' }}</span></td>
                                <td>
                                    <div>{{ $sup->city ?: '—' }}</div>
                                    <small class="text-muted">{{ $sup->state }}</small>
                                </td>
                                <td class="fw-bold">{{ $sup->purchase_orders_count }} POs</td>
                                <td>
                                    @if($sup->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick='editSupplier(@json($sup))'>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.suppliers.destroy', $sup->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this supplier?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No suppliers registered. Click "Add Supplier" to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $suppliers->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Supplier Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="supplierForm" class="modal-content">
            @csrf
            <input type="hidden" name="_method" id="supMethod" value="POST">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="supModalTitle">Add New Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Supplier / Brand Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="supName" class="form-control" required placeholder="e.g. Apex Electronics Ltd">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Company Legal Name</label>
                        <input type="text" name="company_name" id="supCompany" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" id="supContact" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" id="supPhone" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="supEmail" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">GST Number</label>
                        <input type="text" name="gst_number" id="supGst" class="form-control" placeholder="e.g. 29AAAAA0000A1Z5">
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="is_active" id="supActive" checked>
                            <label class="form-check-label" for="supActive">Active Supplier</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Office / Billing Address</label>
                        <textarea name="address" id="supAddress" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">City</label>
                        <input type="text" name="city" id="supCity" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <input type="text" name="state" id="supState" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pincode</label>
                        <input type="text" name="pincode" id="supPincode" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openSupplierModal() {
    $('#supplierForm').attr('action', "{{ route('admin.suppliers.store') }}");
    $('#supMethod').val('POST');
    $('#supModalTitle').text('Add New Supplier');
    $('#supplierForm')[0].reset();
    $('#supActive').prop('checked', true);
    new bootstrap.Modal(document.getElementById('supplierModal')).show();
}

function editSupplier(sup) {
    $('#supplierForm').attr('action', '/admin/suppliers/' + sup.id);
    $('#supMethod').val('PUT');
    $('#supModalTitle').text('Edit Supplier: ' + sup.name);
    $('#supName').val(sup.name);
    $('#supCompany').val(sup.company_name);
    $('#supContact').val(sup.contact_person);
    $('#supPhone').val(sup.phone);
    $('#supEmail').val(sup.email);
    $('#supGst').val(sup.gst_number);
    $('#supAddress').val(sup.address);
    $('#supCity').val(sup.city);
    $('#supState').val(sup.state);
    $('#supPincode').val(sup.pincode);
    $('#supActive').prop('checked', sup.is_active);
    new bootstrap.Modal(document.getElementById('supplierModal')).show();
}
</script>
@endpush
