@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-semibold">Products</h5>
            <button class="btn btn-primary" onclick="openCreateModal()">Add Product</button>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Offer</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="productForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="productId">
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="productName" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slug (Optional)</label>
                    <input type="text" name="slug" id="productSlug" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="productCategory" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Model</label>
                    <select name="product_model_id" id="productModel" class="form-select">
                        <option value="">Select Model (Optional)</option>
                        @foreach($models as $mod)
                            <option value="{{ $mod->id }}">{{ $mod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" id="productPrice" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Offer Price</label>
                    <input type="number" step="0.01" name="offer_price" id="productOfferPrice" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Images</label>
                    <input type="file" name="images[]" id="productImages" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Uploading new images will replace existing ones.</small>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" id="productDesc" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" id="productMetaTitle" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" id="productMetaDesc" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-md-12 mb-3 form-check ms-3">
                    <input type="checkbox" name="is_active" id="productActive" class="form-check-input" value="1" checked>
                    <label class="form-check-label">Is Active</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="saveProductBtn">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    var productModal = new bootstrap.Modal(document.getElementById('productModal'));
    var myEditor;

    ClassicEditor
        .create( document.querySelector( '#productDesc' ) )
        .then( editor => { myEditor = editor; } )
        .catch( error => { console.error( error ); } );
    
    function fetchProducts() {
        $.ajax({
            url: "{{ route('admin.products.index') }}",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                var tbody = $('#productsTableBody');
                tbody.empty();
                if(response.length === 0) {
                    tbody.append('<tr><td colspan="8" class="text-center">No products found.</td></tr>');
                    return;
                }
                $.each(response, function(index, prod) {
                    var status = prod.is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                    var categoryName = prod.category ? prod.category.name : 'None';
                    var modelName = prod.product_model ? prod.product_model.name : 'None';
                    var imageHtml = (prod.images && prod.images.length > 0) ? '<img src="{{ asset("storage") }}/' + prod.images[0] + '" height="50">' : 'No Image';
                    
                    var tr = $('<tr>');
                    tr.append('<td>' + imageHtml + '</td>');
                    tr.append('<td>' + prod.name + '<br><small>' + prod.slug + '</small></td>');
                    tr.append('<td>' + categoryName + '</td>');
                    tr.append('<td>' + modelName + '</td>');
                    tr.append('<td>$' + (prod.price || '0.00') + '</td>');
                    tr.append('<td>$' + (prod.offer_price || '0.00') + '</td>');
                    tr.append('<td>' + status + '</td>');
                    tr.append(`
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editProduct(${prod.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteProduct(${prod.id})">Delete</button>
                        </td>
                    `);
                    tbody.append(tr);
                });
            }
        });
    }

    function openCreateModal() {
        $('#productForm')[0].reset();
        $('#productId').val('');
        $('#productSlug').val('');
        $('#productMetaTitle').val('');
        $('#productMetaDesc').val('');
        $('#formMethod').val('POST');
        if(myEditor) myEditor.setData('');
        $('#productModalLabel').text('Add Product');
        productModal.show();
    }

    function editProduct(id) {
        $.get("{{ url('admin/products') }}/" + id + "/edit", function(data) {
            $('#productId').val(data.id);
            $('#productName').val(data.name);
            $('#productSlug').val(data.slug);
            $('#productCategory').val(data.category_id);
            $('#productModel').val(data.product_model_id);
            $('#productPrice').val(data.price);
            $('#productOfferPrice').val(data.offer_price);
            $('#productMetaTitle').val(data.meta_title);
            $('#productMetaDesc').val(data.meta_description);
            $('#productActive').prop('checked', data.is_active);
            $('#formMethod').val('PUT');
            if(myEditor) myEditor.setData(data.description || '');
            
            $('#productModalLabel').text('Edit Product');
            productModal.show();
        });
    }

    $('#productName').on('input', function() {
        if ($('#productId').val() === '') {
            var slug = $(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            $('#productSlug').val(slug);
        }
    });

    $('#productForm').on('submit', function(e) {
        e.preventDefault();
        $('#saveProductBtn').prop('disabled', true).text('Saving...');
        
        var id = $('#productId').val();
        var url = id ? "{{ url('admin/products') }}/" + id : "{{ route('admin.products.store') }}";
        
        var formData = new FormData(this);
        if(myEditor) {
            formData.set('description', myEditor.getData());
        }

        $.ajax({
            url: url,
            type: "POST", // Laravel requires POST for FormData even for updates. _method=PUT is in the form.
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $('#saveProductBtn').prop('disabled', false).text('Save changes');
                productModal.hide();
                fetchProducts();
                alert(res.message);
            },
            error: function(xhr) {
                $('#saveProductBtn').prop('disabled', false).text('Save changes');
                alert('Error occurred.');
                console.error(xhr.responseText);
            }
        });
    });

    function deleteProduct(id) {
        if(confirm('Are you sure?')) {
            $.ajax({
                url: "{{ url('admin/products') }}/" + id,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    fetchProducts();
                }
            });
        }
    }

    $(document).ready(function() {
        fetchProducts();
    });
</script>
@endpush
