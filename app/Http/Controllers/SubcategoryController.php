<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use Storage;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.subcategory',['categories'=>Category::all()]);
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
        if (count(Subcategory::
            where('name','like',$request->subcategory_name)
            ->where('category_id',$request->subcategory_category)
            ->get()) > 0) {
            return "Already exists!";
        }
        else {
            Subcategory::create(['category_id'=>$request->subcategory_category,'name'=>$request->subcategory_name,'slug'=>str_slug($request->subcategory_name,'-')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $fetch = Subcategory::orderBy('id','desc')->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Domain</th>
                <th>Catgory</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>';
for ($i=0; $i < sizeof($fetch); $i++) {
    $data .='<tr>
                <td>'.$fetch[$i]->id.'</td>
                <td>'.$fetch[$i]->category->domain->name.'</td>
                <td>'.$fetch[$i]->category->name.'</td>
                <td>'.$fetch[$i]->name.'</td>
                <td class="">
                    <button onclick="edit_subcategory('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-edit"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="delete_subcategory('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
        $fetch = Subcategory::orderBy('id','desc')->get();
        $data = '<option value="" selected>Select Subcategory</option>';
        foreach ($fetch as $subcat) {
            $data .= '<option value="'.$subcat->id.'">'.$subcat->category->domain->name.' - '.$subcat->category->name.' - '.$subcat->name.'</option>';
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $subcategory = Subcategory::where('id','=',$request->subcategory_id)->first();
        return json_encode($subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // if ($request->hasFile('subcategory_image')) {
        //     $ctgry = Subcategory::where('id','=',$request->subcategory_id)->first();
        //     Storage::delete('/public/subcategory/'.$ctgry->image);
        //     $fileNameWithExtension = $request->file('subcategory_image')->getClientOriginalName(); // name
        //     $fileNameWithoutExtension = pathinfo($fileNameWithExtension , PATHINFO_FILENAME); // just name
        //     function clean($string) {
        //         $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        //         return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        //     }
        //     $filename = clean($fileNameWithoutExtension);
        //     $fileExtensionWithoutName = $request->file('subcategory_image')->getClientOriginalExtension(); // just extension
        //     $file = $filename.'.'.$fileExtensionWithoutName;
        //     $request->file('subcategory_image')->storeAs('subcategory',$file,'public');
        //     subcategory::where('id',$request->subcategory_id)->update(['image'=>$file]);
        // }
        if (count(Subcategory::
            where('name','like',$request->subcategory_name)
            ->where('category_id',$request->subcategory_category)
            ->get()) > 0) {
            return "Already exists!";
        }
        else {
            Subcategory::where('id',$request->subcategory_id)->update(['name'=>$request->subcategory_name,'slug'=>str_slug($request->subcategory_name),'category_id'=>$request->subcategory_category]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $subcategory = Subcategory::where('id','=',$request->subcategory_id)->first();
        // Storage::delete('/public/subcategory/'.$subcategory->image);
        // foreach ($subcategory->products as $product) {
        //     foreach ($product->images as $img) {
        //         Storage::delete('/public/product/'.$img->image);
        //     }
        // }
        Subcategory::where('id',$request->subcategory_id)->delete();
        // return "All files and post about this Subcategory have deleted successfully";
    }
}
