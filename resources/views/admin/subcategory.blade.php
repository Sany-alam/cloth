@extends('admin.app')

@section('title','Admin - Subcategory')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('subcategory-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Subcategory list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddSubcategoryModal">Add Subcategory</button>
            </div>
            <div class="m-t-25 table-responsive" id="subcategory-table">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddSubcategoryModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="subcategory-name" type="text" class="form-control" placeholder="Subcategory">
                </div>
                <div class="form-group">
                    <select id="subcategory-category" class="form-control"></select>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddSubcategory">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="UpdateSubcategoryModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-subcategory-id">
                <div class="form-group">
                    <input id="update-subcategory-name" type="text" class="form-control" placeholder="Subcategory">
                </div>
                <div class="form-group">
                    <select id="update-subcategory-category" class="form-control"></select>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateSubcategory">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\subcategory.js')}}"></script>
@endsection