<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category');
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
        if (count(Category::
            where('name','like',$request->category_name)
            ->where('domain_id',$request->category_domain)
            ->get()) > 0) {
            return "Already exists!";
        }
        else {
            Category::create(['name'=>$request->category_name,'domain_id'=>$request->category_domain,'slug'=>str_slug($request->category_name)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $fetch = Category::orderBy('id','desc')->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Domain</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-striped">';
for ($i=0; $i < sizeof($fetch); $i++) {
    $data .='<tr>
                <td>'.$fetch[$i]->id.'</td>
                <td>'.$fetch[$i]->domain->name.'</td>
                <td>'.$fetch[$i]->name.'</td>
                <td class="">
                    <button onclick="edit_category('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-edit"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="delete_category('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
        $fetch = Category::orderBy('id','desc')->get();
        $data = '<option value="">Select category</option>';
        foreach ($fetch as $cat) {
            $data .= '<option value="'.$cat->id.'">'.$cat->domain->name.' - '.$cat->name.'</option>';
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = Category::where('id','=',$request->category_id)->first();
        return json_encode($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (count(Category::
            where('name','like',$request->category_name)
            ->where('domain_id',$request->category_domain)
            ->get()) > 0) {
            return "Already exists!";
        }
        else {
            Category::where('id',$request->category_id)->update(['name'=>$request->category_name,'domain_id'=>$request->category_domain,'slug'=>str_slug($request->category_name)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $category = Category::where('id','=',$request->category_id)->first();
        // Storage::delete('/public/category/'.$category->image);
        // foreach ($category->products as $product) {
        //     foreach ($product->images as $img) {
        //         Storage::delete('/public/product/'.$img->image);
        //     }
        // }
        Category::where('id',$request->category_id)->delete();
        // return "All files and post about this category have deleted successfully";
    }
}
