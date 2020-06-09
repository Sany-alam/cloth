@extends('admin.app')

@section('title','Admin - Banner')
@section('page-css')
<link href="{{asset('assets/admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('banner-page','active')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Banner list</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#AddBannerModal">Add Banner</button>
            </div>
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="banner-indicator">
                    
                </ol>
                <div class="carousel-inner" id="banner-items">
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddBannerModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="banner-title">Banner title</label>
                    <input id="banner-title" type="text" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="banner-description">Banner Description</label>
                    <textarea id="banner-description" class="form-control" placeholder="Description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="banner-image">Banner Image</label>
                    <input id="banner-image" type="file" class="form-control">
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid" id="show-banner-image">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="AddBanner">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="UpdateBannerModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Update Banner</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-banner-id">
                <div class="form-group">
                    <label for="update-banner-title">Title</label>
                    <input id="update-banner-title" type="text" class="form-control" placeholder="Banner">
                </div>
                <div class="form-group">
                    <label for="update-banner-description">Description</label>
                    <textarea id="update-banner-description" class="form-control" placeholder="Description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="update-banner-image">Image</label>
                    <input id="update-banner-image" type="file" class="form-control">
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid" id="edit-banner-image" style="width: 100px;height:100px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="text-right">
                        <button data-dismiss="modal" type="button" class="btn btn-primary" id="UpdateBanner">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script src="{{asset('assets\admin\js\custom\banner.js')}}"></script>
@endsection