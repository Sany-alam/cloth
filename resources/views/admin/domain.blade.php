@extends('admin.app')

@section('title','Admin - Domain')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('domain-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Domain list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddDomainModal">Add Domain</button>
            </div>
            <div class="table-responsive m-t-25" id="domain-table">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddDomainModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Domain</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="domain-name" type="text" class="form-control" placeholder="Domain">
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddDomain">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="UpdateDomainModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Domain</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-domain-id">
                <div class="form-group">
                    <label for="update-domain-name">Name</label>
                    <input id="update-domain-name" type="text" class="form-control" placeholder="Domain">
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateDomain">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\domain.js')}}"></script>
@endsection