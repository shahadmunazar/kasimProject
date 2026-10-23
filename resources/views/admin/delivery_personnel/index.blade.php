@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Delivery Personnel & Fleet</h4>
            <p class="text-muted mb-0">Manage in-house delivery agents, assigned vehicles, and availability for orders.</p>
        </div>
        <button type="button" class="btn btn-primary" onclick="openStaffModal()">
            <i class="ti ti-plus me-1"></i> Register Delivery Staff
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
                            <th>Code</th>
                            <th>Agent Name</th>
                            <th>Phone & Email</th>
                            <th>Vehicle Details</th>
                            <th>Active Deliveries</th>
                            <th>Availability</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($staff as $st)
                            <tr>
                                <td>
                                    <span class="badge bg-dark font-monospace">{{ $st->employee_code }}</span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $st->user ? $st->user->name : 'N/A' }}</div>
                                    <small class="text-muted">License: {{ $st->license_number ?: 'N/A' }}</small>
                                </td>
                                <td>
                                    <div><i class="ti ti-phone small me-1"></i>{{ $st->user ? $st->user->phone : '—' }}</div>
                                    <small class="text-muted"><i class="ti ti-mail small me-1"></i>{{ $st->user ? $st->user->email : '—' }}</small>
                                </td>
                                <td>
                                    <div>{{ $st->vehicle_type ?: 'Standard Fleet' }}</div>
                                    <small class="text-muted font-monospace">{{ $st->vehicle_number ?: '—' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-primary border fs-6">
                                        {{ $st->shipments_count ?? $st->activeShipments()->count() }} assigned
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.delivery_personnel.toggle', $st->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @if($st->is_available)
                                            <button type="submit" class="btn btn-sm btn-success rounded-pill" title="Click to toggle offline">
                                                <i class="ti ti-check me-1"></i> Available
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-secondary rounded-pill" title="Click to toggle available">
                                                <i class="ti ti-moon me-1"></i> Off Duty
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('admin.delivery_personnel.destroy', $st->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this delivery staff account?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove account">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No delivery personnel registered. Click "Register Delivery Staff" to add in-house riders.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $staff->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Register Staff Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('admin.delivery_personnel.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Register Delivery Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Rahul Sharma">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                        <input type="text" name="employee_code" class="form-control" required placeholder="e.g. DEL-001">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Phone (Login) <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" required placeholder="e.g. 9876543210">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required placeholder="e.g. rahul.del@tcsmarttechnology.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required minlength="6" placeholder="Min 6 characters">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Emergency Contact</label>
                        <input type="text" name="emergency_contact" class="form-control" placeholder="Contact number">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Vehicle Type</label>
                        <select name="vehicle_type" class="form-select">
                            <option value="Bike">Motorcycle / Bike</option>
                            <option value="Scooter">Scooter</option>
                            <option value="Van">Delivery Van</option>
                            <option value="Truck">Small Truck</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Vehicle Registration Number</label>
                        <input type="text" name="vehicle_number" class="form-control" placeholder="e.g. KA-01-AB-1234">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Driver License Number</label>
                        <input type="text" name="license_number" class="form-control" placeholder="License ID">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create Delivery Account</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openStaffModal() {
    new bootstrap.Modal(document.getElementById('staffModal')).show();
}
</script>
@endpush
