@extends('admin.app')

@section('title','Admin - Products')
@section('page-css')
<link href="{{asset('assets/admin/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/tagify/tagify.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('product-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Product list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddProductModal">Add Product</button>
            </div>
            <div class="m-t-25" id="product-table">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddProductModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddExampleModalScrollableTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col">
                        <label for="product-name">Product Name</label>
                        <input id="product-name" type="text" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group col">
                        <label for="product-price">Price</label>
                        <input id="product-price" type="number" class="form-control" placeholder="Price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-images">Chose images for product</label>
                    <input id="product-images" type="file" class="form-control" multiple>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="product-category">Select Category</label>
                        <select id="product-category" class="select2"></select>
                    </div>
                    <div class="form-group col">
                        <label for="product-brand">Brand (Optional)</label>
                        <input id="product-brand" type="text" class="form-control" placeholder="Brand">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="product-size">Size (Optional)</label>
                        <input id="product-size" class="tagify" placeholder="Size">
                    </div>
                    <div class="form-group col">
                        <label for="product-weight">Weight (Optional)</label>
                        <input id="product-weight" type="text" class="form-control" placeholder="Weight">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="product-fabric">Fabric (Optional)</label>
                        <input id="product-fabric" type="text" class="form-control" placeholder="Fabric">
                    </div>
                    <div class="form-group col">
                        <label for="product-color">Color (Optional)</label>
                        <input id="product-color" class="tagify" placeholder="Color">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-description">Description (Optional)</label>
                    <textarea id="product-description" class="form-control" placeholder="Describe your product"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddProduct">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateProductModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateExampleModalScrollableTitle">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-product-id">
                <div class="row">
                    <div class="form-group col">
                        <label for="update-product-name">Product Name</label>
                        <input id="update-product-name" type="text" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group col">
                        <label for="update-product-price">Price</label>
                        <input id="update-product-price" type="number" class="form-control" placeholder="Price">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="update-product-category">Select Category</label>
                        <select id="update-product-category" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="update-product-brand">Brand (Optional)</label>
                        <input id="update-product-brand" type="text" class="form-control" placeholder="Brand">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="update-product-size">Size (Optional)</label>
                        <input id="update-product-size" class="form-control" placeholder="Size">
                    </div>
                    <div class="form-group col">
                        <label for="update-product-weight">Weight (Optional)</label>
                        <input id="update-product-weight" type="text" class="form-control" placeholder="Weight">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="update-product-fabric">Fabric (Optional)</label>
                        <input id="update-product-fabric" type="text" class="form-control" placeholder="Fabric">
                    </div>
                    <div class="form-group col">
                        <label for="update-product-color">Color (Optional)</label>
                        <input id="update-product-color" class="form-control" placeholder="Color">
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-product-description">Description (Optional)</label>
                    <textarea id="update-product-description" class="form-control" placeholder="Describe your product"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateProduct">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateProductImageModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateExampleModalScrollableTitle">Managing images</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-product-image-id">
                <div class="row" id="old-product-images"></div>
            </div>
            <div class="modal-footer">
                <input type="file" class="form-control" id="new-product-image" multiple>
                <button type="button" class="btn btn-primary" id="UpdateProductImage">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
    <script src="{{ asset('assets\admin\vendors\tagify\jQuery.tagify.min.js') }}"></script>
    <script src="{{ asset('assets\admin\vendors\select2\select2.min.js') }}"></script>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\product.js')}}"></script>
@endsection