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
        $color = $c[0];
        $s = explode(",",$product->size);
        $siz = $s[0];
        $PItems = [
            'id'=>$product->id,
            'category_id'=>$product->category_id,
            'name'=>$product->name,
            'price'=>$product->price,
            'size'=>$request->input('size',$siz),
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
        if (count(session()->get('cart')) > 0) {
            $oldCArt = session()->get('cart');
            foreach ($oldCArt as $key => $value) {
                if ($value['id'] == $PItems['id']) {
                    $value['quantity'] = $value['quantity']+1;
                    session()->push('cart[0].quantity', 4);
                //     if ($value['size'] == $PItems['size'] && $value['color'] == $PItems['color']) {
                //         $value['quantity'] = session()->get('cart')[$key]['quantity']+1;
                        
                //         // return session()->get('cart'.$value['quantity']);
                //         return session()->get('cart');
                //         break;
                    file_put_contents('test.txt',$value['quantity']);
                    // }
                    return session()->get('cart');
                }
            }
        }
        else{
            session()->push('cart', $PItems);
            return session()->get('cart');
        }
    }













    public function cart_count()
    {
        return count(session()->get('cart'));
    }

    public function cart_list()
    {
        $list = "";
        foreach (session()->get('cart') as $key => $value) {
            $list .='
            <tr>
                <td class="product-thumbnail">
                    <img class="product-thumb" src="'.asset('storage/app/public/product/'.Product::find($value['id'])->images[0]->image).'" alt="">
                </td>
                <td class="product-name">
                    <a class="name" href="#">'.$value['name'].'</a>
                </td>
                <td class="product-price">
                    <span class="amount">'.$value['price'].'</span>
                </td>
                <td class="product-quantity">
                    <div class="quantity">
                        <a id="quantity-sub" class="quantity-minus" href="javascript:void(0)">-</a>
                        <input id="quantity" type="text" class="input-text qty text" value="'.$value['quantity'].'">
                        <a id="quantity-add" class="quantity-plus" href="javascript:void(0)">+</a>
                    </div>
                </td>
                <td class="product-subtotal">
                    <span class="amount">'.$value['price']*$value['quantity'].'</span>
                </td>
                <td class="product-remove">
                    <a class="remove" href="javascript:void(0)" onclick="clearSingleProduct('.$value['id'].','.$key.')"><i class="fa fa-close"></i></a>
                </td>
            </tr>
            <script>
            $("#quantity-add").click(function () {
            if ($("#quantity").val() < 10) {
                $("#quantity").val(+$("#quantity").val() + 1);
                }
            });
            $("#quantity-sub").click(function () {
                if ($("#quantity").val() > 1) {
                if ($("#quantity").val() > 1) $("#quantity").val(+$("#quantity").val() - 1);
                }
            });
            </script>';
        }
        if (!empty($list)) {
            return $list;
        }
        else{
            $list = "<h6 style='text-align:center;'>No product available in your cart. <a href='".url('/')."'>Countinue shopping!</a></h6>";
            return $list;
        }
        
    }

    public function cart_clear_product()
    {
        session()->put("cart",[]);
        return "success";
    }


    public function cart_clear_single_product($id,$index)
    {
        $card = session()->get('cart');
        if ($card[$index]['id'] == $id) {
            unset($card[$index]);
        }
        session()->pull('cart',$card);
        return $id." & ".$index;
    }


    public function place_order()
    {
        
    }





}