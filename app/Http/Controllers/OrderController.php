<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function queue()
    {
        return view('admin.order.order-queue');
    }

    public function queue_list()
    {
        $orders = Order::where('status',"Order in queue")->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>User</th>
                <th>Order Code</th>
                <th>Total</th>
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
            <td class="text-left">'.$order->id.'</td>
            <td class="text-left">'.$order->user->name.'</td>
            <td class="text-left">'.$order->order_code.'</td>
            <td class="text-left">'.$order->total.' Tk</td>
            <td class="text-left">'.$order->address.'</td>
            <td class="text-left">'.$order->note.'</td>
            <td class="text-left">'.$order->payment_methode.'</td>
            <td class="text-left">'.$order->payment_confirmation.'</td>
            <td class="">
                <div class="d-flex align-items-center">
                    <div class="badge badge-primary badge-dot m-r-10"></div>
                    <div>Order in queue</div>
                </div>
            </td>
            <td class="text-left">
                <button onclick="productList('.$order->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                    <i class="anticon anticon-ordered-list"></i>
                </button>
            </td>
            <td class="text-left">
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary btn-icon btn-tone btn-rounded" onclick="acceptOrder('.$order->id.')"><i class="anticon anticon-check-circle"></i></button>
                    <button class="btn btn-danger btn-icon btn-tone btn-rounded" onclick="rejectOrder('.$order->id.')"><i class="anticon anticon-close-circle"></i></button>
                </div>
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
            // paging: false,
            // scrollY: 230,
            order:[[0,"desc" ]]
        });
    </script>';

    return $data;
    }

    public function queue_product_list($id)
    {
        $order = Order::find($id);
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product size</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Product Subttotal</th>
            </tr>
        </thead>
        <tbody>';
        foreach (json_decode($order->product) as $value) {
            $data .= '
                    <tr>
                        <td>'.$value->id.'</td>
                        <td>'.$value->name.'</td>
                        <td>'.$value->size.'</td>
                        <td>'.$value->quantity.'</td>
                        <td>'.$value->price.' Tk</td>
                        <td>'.$value->price*$value->quantity.' Tk</td>
                    </tr>
            ';
        }
        $data .= '</tbody>
        </table>';
        return $data;
    }

    public function queue_product_accept($id)
    {
        $orders = Order::where('id',$id)->update(['status'=>"pending"]);
    }

    public function queue_product_reject($id)
    {
        $orders = Order::where('id',$id)->delete();
    }

    public function pending()
    {
        $orders = Order::where('status','pending')->get();
        return view('admin.order.order-pending',['orders'=>$orders]);
    }

    public function complete()
    {
        $orders = Order::where('status','complete')->get();
        return view('admin.order.order-complete',['orders'=>$orders]);
    }



















    public function courier_queue_list()
    {
        
        $orders = Order::where('status',"Order in queue")->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>User</th>
                <th>Total</th>
                <th>Address</th>
                <th>Note</th>
                <th>Payment Methode</th>
                <th>Payment Confirmation</th>
                <th>Product List</th>
                <th>Assign Courier</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($orders as $order){
            $data .= '
            <tr>
                <td class="text-left">'.$order->id.'</td>
                <td class="text-left">'.$order->user->name.'</td>
                <td class="text-left">'.$order->total.' Tk</td>
                <td class="text-left">'.$order->address.'</td>
                <td class="text-left">'.$order->note.'</td>
                <td class="text-left">'.$order->payment_methode.'</td>
                <td class="text-left">'.$order->payment_confirmation.'</td>
                <td class="text-left">
                    <button onclick="productList('.$order->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-ordered-list"></i>
                    </button>
                </td>
                <td class="text-left">
                    <button onclick="assign_couriar('.$order->id.')" class="btn btn-primary btn-sm btn-rounded">Assign</button>
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
                // paging: false,
                // scrollY: 230,
                order:[[0,"desc" ]]
            });
        </script>';

        return $data;
    }
}
