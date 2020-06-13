<?php

namespace App\Http\Controllers;
session_start();
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

    public function cart()
    {
        return view('home.cart');
    }

    public function checkout()
    {
        return view('home.checkout');
    }

    public function product($id)
    {
        $product = Product::where('id',$id)->first();
        $rproduct = Product::whereLike('name','%'.$product->name.'%');
        return view('home.product',['product'=>$product,'rproducts'=>$rproduct]);
    }

    public function cart_add_product(Request $request)
    {
        $product = Product::where('id',$request->id)->first();
        $c = explode(",",$product->color);
        $s = explode(",",$product->size);
        $PItems = [
            'id'=>$product->id,
            'category_id'=>$product->category_id,
            'name'=>$product->name,
            'price'=>$product->price,
            'size'=>$request->input('size',$s[0]),
            'weight'=>$product->weight,
            'fabric'=>$product->fabric,
            'stock'=>$product->stock,
            'description'=>$product->description,
            'brand'=>$product->brand,
            'color'=>$request->input('color',$c[0]),
            'quantity'=>$request->input('quantity', 1),
            'created_at'=>$product->created_at,
            'updated_at'=>$product->updated_at
        ];
        session()->push('cart',$PItems);
        array_push($_SESSION['cart'],$PItems);
        return "success";
    }

    public function cart_clear_product(Request $request)
    {
        unset($_SESSION['cart']);
    }

    public function cart_count()
    {
        // return count(session()->get('cart'));
        return count($_SESSION['cart']);
    }
}
