<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        $product = Product::orderBy('id','desc')->get();
        $banner = Banner::all();
        return view('home.index',['banners'=>$banner,'products'=>$product,'categories'=>$categories]);
    }

    public function product($id)
    {
        $product = Product::where('id',$id)->first();
        $rproduct = Product::whereLike('name','%'.$product->name.'%');
        return view('home.product',['product'=>$product,'rproducts'=>$rproduct]);
    }

    public function cart_add_product($id)
    {
        return $id;
    }
}
