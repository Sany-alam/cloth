@extends('admin.app')

@section('title','Admin - Category')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('category-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Category list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddCategoryModal">Add Category</button>
            </div>
            <div class="m-t-25" id="category-table">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddCategoryModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="category-name" type="text" class="form-control" placeholder="Category">
                </div>
                <div class="form-group">
                    <input id="category-image" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddCategory">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="UpdateCategoryModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-category-id">
                <div class="form-group">
                    <label for="update-category-name">Name</label>
                    <input id="update-category-name" type="text" class="form-control" placeholder="Category">
                </div>
                <div class="form-group">
                    <label for="update-category-image">Image</label>
                    <input id="update-category-image" type="file" class="form-control">
                </div>
                <img src="" alt="" class="img-fluid" id="edit-category-image" style="width: 100px;height:100px;">
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateCategory">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\category.js')}}"></script>
@endsection