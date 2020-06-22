<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product');
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
        // return $request->product_name." ".$request->product_size." ".$request->product_price." ".$request->product_weight." ".$request->product_fabric." ".$request->product_brand." ".$request->product_color." ".$request->product_description." ".$request->product_category." ".print_r($request->product_images);
        $product = Product::create(['name'=>$request->product_name,'category_id'=>$request->product_category,'size'=>$request->product_size,'price'=>$request->product_price,'weight'=>$request->product_weight,'fabric'=>$request->product_fabric,'brand'=>$request->product_brand,'color'=>$request->product_color,'description'=>$request->product_description]);
        // images filtering and save
        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
        foreach ($request->file('product_images') as $images) {
            $fileNameWithExtension = $images->getClientOriginalName(); // name
            $fileNameWithoutExtension = pathinfo($fileNameWithExtension , PATHINFO_FILENAME); // just name
            $filename = clean($fileNameWithoutExtension.$product->updated_at);
            $fileExtensionWithoutName = $images->getClientOriginalExtension(); // just extension
            $file = $filename.'.'.$fileExtensionWithoutName;
            $images->storeAs('product',$file,'public');

            $product->images()->create([
                'image' => $file,
            ]);
        }
    }

    public function stock(Request $request)
    {
        Product::where('id',$request->product_id)->update(['stock'=>$request->product_stock]);
        return $request->product_stock;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $fetch = Product::orderBy('id','desc')->get();
        $data = '<table id="data-table" class="table table-hover e-commerce-table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Images</th>
                <th>Name</th>
                <th>Category</th>
                <!---<th>Size</th>--->
                <th>Price</th>
               <!--- <th>Weight</th>--->
               <!---<th>Fabric</th>--->
                <th>Stock</th>
                <!---<th>Description</th>
                <th>Brand</th>
                <th>Color</th>--->
                <th>Edit</th>
                <th>Manage images</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>';
for ($i=0; $i < sizeof($fetch); $i++) {
    $images = Product::find($fetch[$i]->id)->images;
    $imgs = '';
    foreach ($images as $image) {
        $imgs .= '<div class="avatar avatar-image avatar-square"><img src='.asset('storage/app/public/product/'.$image->image).' alt="image" /></div>';
    }
    if ($fetch[$i]->stock == 0) {
        $stock = '<div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="product-stock'.$i.'" checked>
                  <label onclick="stock('.$fetch[$i]->id.',1)" class="custom-control-label" for="product-stock'.$i.'"></label>
                </div>';
    }
    else if($fetch[$i]->stock == 1) {
        $stock = '<div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="product-stock'.$i.'">
                  <label onclick="stock('.$fetch[$i]->id.',0)" class="custom-control-label" for="product-stock'.$i.'"></label>
                </div>';
    }
    $data .='<tr>
                <td>'.$fetch[$i]->id.'</td>
                <td>'.$imgs.'</td>
                <td>'.$fetch[$i]->name.'</td>
                <td>'.$fetch[$i]->category->name.'</td>
                <td>'.$fetch[$i]->price.'</td>
                <!--- <td>'.$fetch[$i]->size.'</td>
                <td>'.$fetch[$i]->weight.'</td>
                <td>'.$fetch[$i]->fabric.'</td>
                <td>'.$fetch[$i]->description.'</td>
                <td>'.$fetch[$i]->brand.'</td>
                <td>'.$fetch[$i]->color.'</td> --->
                <td>
                    '.$stock.'
                </td>
                <td class="">
                    <button onclick="edit_product('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-edit"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="edit_product_image('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                        <i class="anticon anticon-picture"></i>
                    </button>
                </td>
                <td class="">
                    <button onclick="delete_product('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
                order:[[0,"desc" ]]
            });
            </script>
            ';

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        return json_encode($product);
    }

    public function img(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        $data = '';
        foreach ($product->images as $image) {
            $data .='<div class="col-md-6"><div class="card">
            <div class="card-body">
                <img src="../storage/app/public/product/'.$image->image.'" alt="" class="img-fluid" id="edit-category-image" >
            </div>
            <div class="card-footer">
                <button onclick="delete_single_image('.$image->id.')" class="btn btn-light">Delete <i class="anticon anticon-delete"></i></button>
            </div>
        </div></div>';
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Product::where('id',$request->product_id)->update(['name'=>$request->product_name,'category_id'=>$request->product_category,'size'=>$request->product_size,'price'=>$request->product_price,'weight'=>$request->product_weight,'fabric'=>$request->product_fabric,'brand'=>$request->product_brand,'color'=>$request->product_color,'description'=>$request->product_description]);
        return "Successfully Updated";
    }

    public function img_new_upload(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
        foreach ($request->file('product_new_image') as $images) {
            $fileNameWithExtension = $images->getClientOriginalName(); // name
            $fileNameWithoutExtension = pathinfo($fileNameWithExtension , PATHINFO_FILENAME); // just name
            $filename = clean($fileNameWithoutExtension.$product->updated_at);
            $fileExtensionWithoutName = $images->getClientOriginalExtension(); // just extension
            $file = $filename.'.'.$fileExtensionWithoutName;
            $images->storeAs('product',$file,'public');

            $product->images()->create([
                'image' => $file,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        foreach ($product->images as $img) {
            Storage::delete('/public/product/'.$img->image);
        }
        Product::where('id',$request->product_id)->delete();
        return "Product deleted succesfully";
    }

    public function single_img(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        Storage::delete('/public/product/'.$product->images->find($request->image_id)->image);
        $product->images->find($request->image_id)->delete();
    }
}
