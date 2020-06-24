<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Storage;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.domain',['domains'=>Domain::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count(Domain::where('name','like',$request->domain_name)->get()) > 0) {
            return "Already exists!";
        }
        else {
            Domain::create(['name'=>$request->domain_name]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        $fetch = domain::orderBy('id','desc')->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-striped">';
for ($i=0; $i < sizeof($fetch); $i++) {
    $data .='<tr>
                <td>'.$fetch[$i]->id.'</td>
                <td>'.$fetch[$i]->name.'</td>
                <td class="">
                    <button onclick="edit_domain('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-edit"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="delete_domain('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
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

    public function list()
    {
        $fetch = Domain::orderBy('id','desc')->get();
        $data = '<option value="">Select Domain</option>';
        foreach ($fetch as $dom) {
            $data .= '<option value="'.$dom->id.'">'.$dom->name.'</option>';
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $domain = Domain::where('id','=',$request->domain_id)->first();
        return json_encode($domain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (count(Domain::where('name','like',$request->domain_name)->get()) > 0) {
            return "Already exists!";
        }
        else {
            Domain::where('id',$request->domain_id)->update(['name'=>$request->domain_name]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $domain = Domain::where('id','=',$request->domain_id)->first();
        // foreach ($domain->products as $product) {
        //     foreach ($product->images as $img) {
        //         Storage::delete('/public/product/'.$img->image);
        //     }
        // }
        Domain::where('id',$request->domain_id)->delete();
        // return "All files and post about this domain have deleted successfully";
    }
}
