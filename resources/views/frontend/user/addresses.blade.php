@extends('frontend.user.layout')

@section('dashboard_content')
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        
        <div id="alertBox" class="alert d-none"></div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">My Addresses</h4>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()"><i class="fa fa-plus me-1"></i> Add New Address</button>
        </div>
        
        <div id="addressListContainer">
            @if($addresses->isEmpty())
                <div class="alert alert-info border-0 text-center py-4">
                    <i class="fa fa-map-marker-alt fa-3x mb-3 text-muted"></i>
                    <h5>No addresses saved</h5>
                    <p>Add a delivery address to make checkout faster.</p>
                </div>
            @else
                <div class="row">
                    @foreach($addresses as $address)
                    <div class="col-md-6 mb-3">
                        <div class="card border {{ $address->is_default ? 'border-primary' : '' }} h-100">
                            <div class="card-body">
                                @if($address->is_default)
                                    <span class="badge bg-primary mb-2">Default Address</span>
                                @endif
                                <h6 class="fw-bold">{{ $address->name }}</h6>
                                <p class="mb-1 text-muted">
                                    <i class="fa fa-phone small me-1"></i> {{ $address->phone }}
                                    @if($address->alternative_number)
                                        <br><i class="fa fa-phone-alt small me-1"></i> {{ $address->alternative_number }}
                                    @endif
                                </p>
                                <p class="mb-2">
                                    {{ $address->address_line_1 }}<br>
                                    {{ $address->address_line_2 ? $address->address_line_2 . '<br>' : '' }}
                                    {{ $address->city }}, {{ $address->state }} - {{ $address->zip }}
                                </p>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-secondary" onclick='openEditModal(@json($address))'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteAddress('{{ $address->id }}')">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Address Modal (Used for both Add and Edit) -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="addressForm" onsubmit="handleAddressSubmit(event)">
                @csrf
                <input type="hidden" name="address_id" id="address_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalAlert" class="alert d-none"></div>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" id="addr_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="addr_phone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alternative Number</label>
                            <input type="text" name="alternative_number" id="addr_alt_phone" class="form-control" placeholder="Optional">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address Line 1</label>
                            <input type="text" name="address_line_1" id="addr_line1" class="form-control" placeholder="Street address, P.O. box, etc." required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address Line 2 (Optional)</label>
                            <input type="text" name="address_line_2" id="addr_line2" class="form-control" placeholder="Apartment, suite, unit, building, floor, etc.">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">City</label>
                            <input type="text" name="city" id="addr_city" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" name="state" id="addr_state" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">ZIP Code</label>
                            <input type="text" name="zip" id="addr_zip" class="form-control" required>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" value="1" id="addr_default">
                                <label class="form-check-label" for="addr_default">
                                    Set as default address
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btnSaveAddress">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let addressModal;

    document.addEventListener("DOMContentLoaded", function() {
        addressModal = new bootstrap.Modal(document.getElementById('addressModal'));
    });

    function openAddModal() {
        document.getElementById('addressForm').reset();
        document.getElementById('address_id').value = '';
        document.getElementById('modalTitle').innerText = 'Add New Address';
        document.getElementById('modalAlert').classList.add('d-none');
        addressModal.show();
    }

    function openEditModal(address) {
        document.getElementById('addressForm').reset();
        document.getElementById('modalAlert').classList.add('d-none');
        
        document.getElementById('address_id').value = address.id;
        document.getElementById('modalTitle').innerText = 'Edit Address';
        
        document.getElementById('addr_name').value = address.name;
        document.getElementById('addr_phone').value = address.phone;
        document.getElementById('addr_alt_phone').value = address.alternative_number || '';
        document.getElementById('addr_line1').value = address.address_line_1;
        document.getElementById('addr_line2').value = address.address_line_2 || '';
        document.getElementById('addr_city').value = address.city;
        document.getElementById('addr_state').value = address.state;
        document.getElementById('addr_zip').value = address.zip;
        document.getElementById('addr_default').checked = address.is_default ? true : false;
        
        addressModal.show();
    }

    function showMainAlert(msg, type) {
        const box = document.getElementById('alertBox');
        box.className = `alert alert-${type} mb-4`;
        box.innerText = msg;
        setTimeout(() => box.classList.add('d-none'), 5000);
    }

    function handleAddressSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('btnSaveAddress');
        const id = document.getElementById('address_id').value;
        const isEdit = id !== '';
        
        btn.disabled = true;
        btn.innerHTML = 'Saving...';
        
        const url = isEdit ? `{{ url('/dashboard/addresses') }}/${id}` : `{{ route('frontend.dashboard.addresses.store') }}`;
        
        $.post(url, $('#addressForm').serialize())
        .done(res => {
            addressModal.hide();
            showMainAlert(res.message, 'success');
            // Magic update: fetch the container again without page reload
            $('#addressListContainer').load(location.href + ' #addressListContainer');
        })
        .fail(err => {
            const alert = document.getElementById('modalAlert');
            alert.className = 'alert alert-danger';
            alert.innerText = err.responseJSON?.message || 'Error saving address.';
        })
        .always(() => {
            btn.disabled = false;
            btn.innerHTML = 'Save Address';
        });
    }

    function deleteAddress(id) {
        if(!confirm('Are you sure you want to delete this address?')) return;
        
        $.ajax({
            url: `{{ url('/dashboard/addresses') }}/${id}`,
            type: 'DELETE',
            data: { _token: '{{ csrf_token() }}' }
        })
        .done(res => {
            showMainAlert(res.message, 'success');
            $('#addressListContainer').load(location.href + ' #addressListContainer');
        })
        .fail(err => {
            showMainAlert('Error deleting address', 'danger');
        });
    }
</script>
@endpush
@endsection
