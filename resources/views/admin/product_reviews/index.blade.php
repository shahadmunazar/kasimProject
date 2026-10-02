@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Product Reviews</h1>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Reviews</h6>
        </div>
        <div class="card-body">
            <form id="filterForm" class="row gx-3 gy-2 align-items-center">
                <div class="col-sm-3">
                    <label class="visually-hidden">Search</label>
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search by name, email, or comment..." value="{{ request('search') }}">
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden">Product</label>
                    <select class="form-control" name="product_id" id="productFilter">
                        <option value="">All Products</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden">Rating</label>
                    <select class="form-control" name="rating" id="ratingFilter">
                        <option value="">All Ratings</option>
                        <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary w-100 d-none" id="applyFilterBtn"><i class="ti ti-filter"></i> Apply</button>
                    <div class="text-muted small ms-2"><i class="ti ti-refresh"></i> Auto-filtering enabled</div>
                </div>
            </form>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Reviews List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Reviewer</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @include('admin.product_reviews.table')
                    </tbody>
                </table>
            </div>
            
            <div id="paginationContainer" class="d-flex justify-content-center mt-4">
                {{ $reviews->appends(request()->all())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    
    function loadData(url) {
        var formData = $('#filterForm').serialize();
        var finalUrl = url ? url : '{{ route('admin.product_reviews.index') }}';
        
        // Append form data to URL if not already present
        if(!url && formData) {
            finalUrl += '?' + formData;
        }

        $.ajax({
            url: finalUrl,
            type: 'GET',
            data: url ? formData : null, // If url is provided, pass data separately
            success: function(res) {
                $('#tableBody').html(res.html);
                $('#paginationContainer').html(res.pagination);
                
                // Update URL to reflect filters (for history)
                var newUrl = '{{ route('admin.product_reviews.index') }}' + '?' + formData;
                window.history.pushState({path: newUrl}, '', newUrl);
            }
        });
    }

    $('#filterForm').on('submit', function(e) {
        e.preventDefault();
        loadData();
    });

    // Auto load data when dropdowns change
    $('#productFilter, #ratingFilter').on('change', function() {
        loadData();
    });

    // Auto load data when searching (with simple debounce)
    var searchTimeout;
    $('#search').on('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            loadData();
        }, 500);
    });

    $(document).on('click', '#paginationContainer a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadData(url);
    });

    // Toggle Status
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var btn = $(this);
        
        $.ajax({
            url: '{{ url('admin/product_reviews') }}/' + id + '/toggle-status',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                if(res.success) {
                    if(res.is_approved) {
                        btn.removeClass('btn-secondary').addClass('btn-success').html('<i class="ti ti-check"></i> Approved');
                    } else {
                        btn.removeClass('btn-success').addClass('btn-secondary').html('<i class="ti ti-x"></i> Hidden');
                    }
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        });
    });

    // Delete
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74a3b',
            cancelButtonColor: '#858796',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url('admin/product_reviews') }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        if(res.success) {
                            Swal.fire(
                                'Deleted!',
                                res.message,
                                'success'
                            );
                            loadData(); // Reload table
                        }
                    }
                });
            }
        })
    });
});
</script>
@endpush
