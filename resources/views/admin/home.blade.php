@extends('admin.app')

@section('title','Admin - Home')
@section('home-page','active')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">$23,523</h2>
                            <p class="m-b-0 text-muted">Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">+ 17.21%</h2>
                            <p class="m-b-0 text-muted">Growth</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($orders)}}</h2>
                            <p class="m-b-0 text-muted">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($users)}}</h2>
                            <p class="m-b-0 text-muted">Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection