@extends('admin.app')
@section('panding','active')
@section('title','Admin - Order')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('order-page','active')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Order list</h4>
                <div class="m-b-10">
                    <select id="show-status" class="custom-select" style="max-width: 180px;">
                        <option>Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                    </select>
                </div>
            </div>
            <div class="m-t-25" id="order-table">

            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ProductListModal">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body" id="product-list">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AssignCourierModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Assign courier</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4>Select courier <select class="form-control" id="courier-list"></select></h4>
                <h6>For order no <input type="text" id="order-id" class="form-control" disabled></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="AssignCourier">Assign</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
    <script src={{asset("assets/admin/vendors/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{asset("assets/admin/vendors/datatables/dataTables.bootstrap.min.js")}}></script>
    <script src={{asset("assets/admin/js/pages/datatables.js")}}></script>
@endsection
@section('custom-js')
    <script>
        var admin = "{{url('admin/')}}";
    </script>
    <script src="{{asset('assets\admin\js\custom\order\pending-processing.js')}}"></script>
@endsection
