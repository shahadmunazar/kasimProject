@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-semibold">Categories</h5>
            <button class="btn btn-primary" onclick="openCreateModal()">Add Category</button>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="categoriesTableBody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="categoryForm">
        @csrf
        <input type="hidden" name="id" id="categoryId">
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" id="categoryName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Slug (Optional, auto-generated if left blank)</label>
                <input type="text" name="slug" id="categorySlug" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" id="categoryMetaTitle" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" id="categoryMetaDesc" class="form-control" rows="2"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="categoryActive" class="form-check-input" value="1" checked>
                <label class="form-check-label">Is Active</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
    
    function fetchCategories() {
        $.ajax({
            url: "{{ route('admin.categories.index') }}",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                var tbody = $('#categoriesTableBody');
                tbody.empty();
                if(response.length === 0) {
                    tbody.append('<tr><td colspan="4" class="text-center">No categories found.</td></tr>');
                    return;
                }
                $.each(response, function(index, cat) {
                    var status = cat.is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                    var tr = $('<tr>');
                    tr.append('<td>' + cat.name + '</td>');
                    tr.append('<td>' + cat.slug + '</td>');
                    tr.append('<td>' + status + '</td>');
                    tr.append(`
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editCategory(${cat.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(${cat.id})">Delete</button>
                        </td>
                    `);
                    tbody.append(tr);
                });
            }
        });
    }

    function openCreateModal() {
        $('#categoryForm')[0].reset();
        $('#categoryId').val('');
        $('#categorySlug').val('');
        $('#categoryMetaTitle').val('');
        $('#categoryMetaDesc').val('');
        $('#formMethod').val('POST');
        $('#categoryModalLabel').text('Add Category');
        categoryModal.show();
    }

    function editCategory(id) {
        $.get("{{ url('admin/categories') }}/" + id + "/edit", function(data) {
            $('#categoryId').val(data.id);
            $('#categoryName').val(data.name);
            $('#categorySlug').val(data.slug);
            $('#categoryMetaTitle').val(data.meta_title);
            $('#categoryMetaDesc').val(data.meta_description);
            $('#categoryActive').prop('checked', data.is_active);
            $('#formMethod').val('PUT');
            $('#categoryModalLabel').text('Edit Category');
            categoryModal.show();
        });
    }

    $('#categoryName').on('input', function() {
        if ($('#categoryId').val() === '') {
            var slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            $('#categorySlug').val(slug);
        }
    });

    $('#categoryForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#categoryId').val();
        var url = id ? "{{ url('admin/categories') }}/" + id : "{{ route('admin.categories.store') }}";
        
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serialize(),
            success: function(res) {
                categoryModal.hide();
                fetchCategories();
                alert(res.message);
            },
            error: function(xhr) {
                alert('Error occurred.');
            }
        });
    });

    function deleteCategory(id) {
        if(confirm('Are you sure?')) {
            $.ajax({
                url: "{{ url('admin/categories') }}/" + id,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    fetchCategories();
                }
            });
        }
    }

    $(document).ready(function() {
        fetchCategories();
    });
</script>
@endpush
