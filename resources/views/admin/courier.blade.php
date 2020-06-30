@extends('admin.app')

@section('title','Admin - Courier')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('courier-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Courier list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddCourierModal">Add Courier</button>
            </div>
            <div class="m-t-25 table-responsive" id="courier-table">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddCourierModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Courier</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="courier-name">Name :</label>
                    <input id="courier-name" type="text" class="form-control" placeholder="Courier Name">
                </div>
                <div class="form-group">
                    <label for="courier-email">Email :</label>
                    <input id="courier-email" type="email" class="form-control" placeholder="Courier Email">
                </div>
                <div class="form-group">
                    <label for="courier-phone">Phone :</label>
                    <input id="courier-phone" type="text" class="form-control" placeholder="Courier Phone">
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddCourier">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="UpdateCourierModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Courier</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="hidden-courier-id">
                <div class="form-group">
                    <input id="update-courier-name" type="text" class="form-control" placeholder="Courier">
                </div>
                <div class="form-group">
                    <label for="courier-email">Email :</label>
                    <input id="update-courier-email" type="email" class="form-control" placeholder="Courier Email">
                </div>
                <div class="form-group">
                    <label for="courier-phone">Phone :</label>
                    <input id="update-courier-phone" type="text" class="form-control" placeholder="Courier Phone">
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateCourier">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\courier.js')}}"></script>
@endsection