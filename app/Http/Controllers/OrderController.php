<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function queue()
    {

        return view('admin.order-queue');
    }

    public function queue_list()
    {
        $orders = Order::where('status',"Order in queue")->get();
        $data = '<table id="data-table" class="table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>User</th>
                <th>Order Code</th>
                <th>Address</th>
                <th>Note</th>
                <th>Payment Methode</th>
                <th>Payment Confirmation</th>
                <th>Status</th>
                <th>Product</th>
                <th>Accept Or Reject</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($orders as $order){
        $data .= '
        <tr>
            <td>'.$order->id.'</td>
            <td>'.$order->user->name.'</td>
            <td>'.$order->order_code.'</td>
            <td>'.$order->address.'</td>
            <td>'.$order->note.'</td>
            <td>'.$order->payment_methode.'</td>
            <td>'.$order->payment_confirmation.'</td>
            <td class="">
                <div class="d-flex align-items-center">
                    <div class="badge badge-primary badge-dot m-r-10"></div>
                    <div>Order in queue</div>
                </div>
            </td>
            <td class="">
                <button onclick="orderList('.$order->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                    <i class="anticon anticon-ordered-list"></i>
                </button>
            </td>
            <td class="">
                <button class="btn btn-primary btn-icon btn-tone btn-rounded"><i class="anticon anticon-check-circle"></i></button>
                <button class="btn btn-danger btn-icon btn-tone btn-rounded"><i class="anticon anticon-close-circle"></i></button>
            </td>
        </tr>';
    }
    $data .='
        </tbody>
    </table>

    <script src='.asset("assets/admin/vendors/datatables/jquery.dataTables.min.js").'></script>
    <script src='.asset("assets/admin/vendors/datatables/dataTables.bootstrap.min.js").'></script>
    <script src='.asset("assets/admin/js/pages/datatables.js").'></script>

    <script>
        $("#data-table").DataTable({
            paging: false,
            scrollY: 230,
            order:[[0,"desc" ]]
        });
    </script>';

    return $data;
    }

    public function pending()
    {
        $orders = Order::where('status','pending')->get();
        return view('admin.order-pending',['orders'=>$orders]);
    }

    public function complete()
    {
        $orders = Order::where('status','complete')->get();
        return view('admin.order-complete',['orders'=>$orders]);
    }
}
