<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;

class CourierController extends Controller
{
    public function index()
    {
        return view('admin.courier');
    }

    public function store(Request $request)
    {
        Courier::create($request->all());
    }

    public function show()
    {
        $fetch = Courier::all();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-striped">';
for ($i=0; $i < sizeof($fetch); $i++) {
    $data .='<tr>
                <td>'.$fetch[$i]->id.'</td>
                <td>'.$fetch[$i]->name.'</td>
                <td>'.$fetch[$i]->email.'</td>
                <td>'.$fetch[$i]->phone.'</td>
                <td class="">
                    <button onclick="edit_courier('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-edit"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="delete_courier('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-delete"></i>
                    </button>
                </td>
            </tr>';
        }
        $data .='</tbody>
            </table>
            <script src='.asset("assets/admin/vendors/datatables/jquery.dataTables.min.js").'></script>
            <script src='.asset("assets/admin/vendors/datatables/dataTables.bootstrap.min.js").'></script>
            <script src='.asset("assets/admin/js/pages/datatables.js").'></script>
            <script>
            $("#data-table").DataTable({
                // paging: false,
                // scrollY: 350,
                order:[[0,"desc" ]],
                responsive: true
            });
            </script>';

        return $data;
    }

    public function destroy($id)
    {
        Courier::where('id',$id)->delete();
    }

    public function edit($id)
    {
        return json_encode(Courier::where('id',$id)->first());
    }

    public function update(Request $request)
    {
        Courier::where('id',$request->id)->update(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone]);
    }
}
