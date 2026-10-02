@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Product Inquiries (Orders)</h5>
        
        <form method="GET" action="{{ route('admin.product_inquiries.index') }}" class="mb-4" id="filterForm">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{ request('product_name') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="user_name" class="form-control" placeholder="User Name" value="{{ request('user_name') }}">
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('admin.product_inquiries.index') }}" class="btn btn-secondary" id="clearFilter">Clear</a>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="inquiriesTableBody">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-center mt-3" id="paginationContainer"></div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    function fetchInquiries(url) {
        $.ajax({
            url: url || "{{ route('admin.product_inquiries.index') }}",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                var tbody = $('#inquiriesTableBody');
                tbody.empty();
                
                if (response.data.length === 0) {
                    tbody.append('<tr><td colspan="6" class="text-center">No inquiries yet.</td></tr>');
                } else {
                    $.each(response.data, function(index, inq) {
                        var date = new Date(inq.created_at);
                        var formattedDate = date.toLocaleString('en-US', { month: 'short', day: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false });
                        
                        var tr = $('<tr>');
                        tr.append('<td>' + formattedDate + '</td>');
                        tr.append('<td>' + (inq.product ? inq.product.name : 'Unknown') + '</td>');
                        tr.append('<td>' + inq.name + '</td>');
                        tr.append('<td>' + (inq.email || '') + '</td>');
                        tr.append('<td>' + inq.phone + '</td>');
                        tr.append('<td>' + (inq.message || '') + '</td>');
                        tbody.append(tr);
                    });
                }

                // Render pagination
                var pagination = '<nav><ul class="pagination">';
                $.each(response.links, function(index, link) {
                    var activeClass = link.active ? 'active' : '';
                    var disabledClass = link.url === null ? 'disabled' : '';
                    pagination += '<li class="page-item ' + activeClass + ' ' + disabledClass + '">';
                    var linkUrl = link.url ? link.url : '#';
                    pagination += '<a class="page-link" href="' + linkUrl + '">' + link.label + '</a>';
                    pagination += '</li>';
                });
                pagination += '</ul></nav>';
                $('#paginationContainer').html(pagination);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }

    // Load initial data
    fetchInquiries(window.location.href);

    $('#filterForm').on('submit', function(e) {
        e.preventDefault();
        var url = $(this).attr('action') + '?' + $(this).serialize();
        fetchInquiries(url);
        window.history.pushState(null, '', url);
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (url && url !== '#') {
            fetchInquiries(url);
            window.history.pushState(null, '', url);
        }
    });

    $('#clearFilter').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#filterForm').find('input[type="text"], input[type="date"]').val('');
        fetchInquiries(url);
        window.history.pushState(null, '', url);
    });
});
</script>
@endpush
