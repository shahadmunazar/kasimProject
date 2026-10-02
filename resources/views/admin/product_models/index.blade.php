@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-semibold">Product Models</h5>
            <button class="btn btn-primary" onclick="openCreateModal()">Add Model</button>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="modelsTableBody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="modelForm">
        @csrf
        <input type="hidden" name="id" id="modelId">
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="modelModalLabel">Product Model</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" id="modelCategory" class="form-select" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" id="modelName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Slug (Optional, auto-generated if left blank)</label>
                <input type="text" name="slug" id="modelSlug" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" id="modelMetaTitle" class="form-control">
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" id="modelMetaDesc" class="form-control" rows="2"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="modelActive" class="form-check-input" value="1" checked>
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
    var modelModal = new bootstrap.Modal(document.getElementById('modelModal'));
    
    function fetchModels() {
        $.ajax({
            url: "{{ route('admin.product_models.index') }}",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                var tbody = $('#modelsTableBody');
                tbody.empty();
                if(response.length === 0) {
                    tbody.append('<tr><td colspan="5" class="text-center">No models found.</td></tr>');
                    return;
                }
                $.each(response, function(index, model) {
                    var status = model.is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                    var categoryName = model.category ? model.category.name : 'None';
                    var tr = $('<tr>');
                    tr.append('<td>' + categoryName + '</td>');
                    tr.append('<td>' + model.name + '</td>');
                    tr.append('<td>' + model.slug + '</td>');
                    tr.append('<td>' + status + '</td>');
                    tr.append(`
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editModel(${model.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteModel(${model.id})">Delete</button>
                        </td>
                    `);
                    tbody.append(tr);
                });
            }
        });
    }

    function openCreateModal() {
        $('#modelForm')[0].reset();
        $('#modelId').val('');
        $('#modelSlug').val('');
        $('#modelMetaTitle').val('');
        $('#modelMetaDesc').val('');
        $('#formMethod').val('POST');
        $('#modelModalLabel').text('Add Model');
        modelModal.show();
    }

    function editModel(id) {
        $.get("{{ url('admin/product_models') }}/" + id + "/edit", function(data) {
            $('#modelId').val(data.id);
            $('#modelCategory').val(data.category_id);
            $('#modelName').val(data.name);
            $('#modelSlug').val(data.slug);
            $('#modelMetaTitle').val(data.meta_title);
            $('#modelMetaDesc').val(data.meta_description);
            $('#modelActive').prop('checked', data.is_active);
            $('#formMethod').val('PUT');
            $('#modelModalLabel').text('Edit Model');
            modelModal.show();
        });
    }

    $('#modelName').on('input', function() {
        if ($('#modelId').val() === '') {
            var slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            $('#modelSlug').val(slug);
        }
    });

    $('#modelForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#modelId').val();
        var url = id ? "{{ url('admin/product_models') }}/" + id : "{{ route('admin.product_models.store') }}";
        
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serialize(),
            success: function(res) {
                modelModal.hide();
                fetchModels();
                alert(res.message);
            },
            error: function(xhr) {
                alert('Error occurred.');
            }
        });
    });

    function deleteModel(id) {
        if(confirm('Are you sure?')) {
            $.ajax({
                url: "{{ url('admin/product_models') }}/" + id,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    fetchModels();
                }
            });
        }
    }

    $(document).ready(function() {
        fetchModels();
    });
</script>
@endpush
