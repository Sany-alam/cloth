@extends('admin.app')
@section('courier-queue','active')
@section('title','Admin - Couriar')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('order-page','active')
@section('content')
    <div class="card mb-0">
        <div class="card-body ">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Assign courier</h4>
            </div>
            <div class="m-t-25 table-responsive" id="order-table">

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

<div class="modal fade bd-example-modal-lg" id="CourierAssignModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Assign courier</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="order-id">
                <div class="form-group">
                    <label for="name">Courier Name</label>
                    <input id="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Courier Email</label>
                    <input id="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Courier Phone Number</label>
                    <input id="phone" type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-courier">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')

@endsection
@section('custom-js')
    <script>
        var admin = "{{url('admin/')}}";
    </script>
    <script src="{{asset('assets\admin\js\custom\courier\queue.js?{time()}')}}"></script>
@endsection
