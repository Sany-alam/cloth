@extends('admin.app')
@section('complete','active')
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
                {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#AddOrderModal">Add Order</button> --}}
            </div>
            <div class="m-t-25" id="order-table">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>User</th>
                            <th>Order Code</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>Payment Methode</th>
                            <th>Payment Confirmation</th>
                            <th>Product</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->order_code}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->note}}</td>
                            <td>{{$order->payment_methode}}</td>
                            <td>{{$order->payment_confirmation}}</td>
                            <td class="">
                                <button onclick="orderList('{{$order->id}}')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-ordered-list"></i>
                                </button>
                            </td>
                            <td class="">
                                {{-- <button onclick="orderList('{{$order->id}}')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-ordered-list"></i>
                                </button> --}}
                                <div class="d-flex align-items-center">
                                    <div class="badge badge-primary badge-dot m-r-10"></div>
                                    <div>Order in queue</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
            <div class="modal-body" id="order-list">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>UsProduct Name</th>
                            <th>Product size</th>
                            <th>Product Color</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Product Subttotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach (json_decode($order->product) as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->color}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->price*$product->quantity}}</td>
                                {{-- <td class="">
                                    <button onclick="orderList('{{$order->id}}')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-ordered-list"></i>
                                    </button>
                                </td> --}}
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="{{asset('assets\admin\js\custom\order.js')}}"></script>
@endsection
