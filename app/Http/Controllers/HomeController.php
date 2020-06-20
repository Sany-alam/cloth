<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Banner;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'color'=>$product->color,
            'quantity'=>$request->input('quantity', 1),
            'created_at'=>$product->created_at,
            'updated_at'=>$product->updated_at
        ];
        if (count(session()->get('cart')) > 0) {
            $cart = session()->get('cart');
            $count = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $PItems['id'] && $value['size'] == $PItems['size']) {
                    $count = 1;
                }
            }
            if ($count == 0) {
                session()->push('cart', $PItems);
            }
            else{
                return "You have already added this, increase quantity in cart to order more.";
            }
        }
        else{
            session()->push('cart', $PItems);
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
                <td class="product-thumbnail" style="text-align:left;">
                    <img class="product-thumb" src="'.asset('storage/app/public/product/'.Product::find($value['id'])->images[0]->image).'" alt="">
                </td>
                <td class="product-name" style="text-align:left;">
                    <a class="name" href="product/no/'.$value['id'].'">'.$value['name'].'</a>
                </td>
                <td class="product-price" style="text-align:left;">
                    <span class="amount">'.$value['size'].'</span>
                </td>
                <td class="product-price" style="text-align:left;">
                    <span class="amount">'.$value['color'].'</span>
                </td>
                <td class="product-price" style="text-align:left;">
                    <span class="amount">'.$value['price'].'</span>
                </td>
                <td class="product-quantity">
                    <div class="quantity">
                        <a id="quantity-sub'.$key.$value['id'].'" class="quantity-minus" href="javascript:void(0)">-</a>
                        <input id="quantity'.$key.$value['id'].'" type="text" class="input-text qty text" name="quantity[]" value="'.$value['quantity'].'">
                        <a id="quantity-add'.$key.$value['id'].'" class="quantity-plus" href="javascript:void(0)">+</a>
                    </div>
                </td>.
                <td class="product-remove">
                    <a class="remove button" href="javascript:void(0)" onclick="clearSingleProduct('.$value['id'].','.$key.')"><i class="fa fa-close"></i></a>
                </td>
            </tr>
            <script>
            $("#quantity-add'.$key.$value['id'].'").click(function () {
            if ($("#quantity'.$key.$value['id'].'").val() < 10) {
                $("#quantity'.$key.$value['id'].'").val(+$("#quantity'.$key.$value['id'].'").val() + 1);
                }
            });
            $("#quantity-sub'.$key.$value['id'].'").click(function () {
                if ($("#quantity'.$key.$value['id'].'").val() > 1) {
                if ($("#quantity'.$key.$value['id'].'").val() > 1) $("#quantity'.$key.$value['id'].'").val(+$("#quantity'.$key.$value['id'].'").val() - 1);
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
        $card = session()->pull('cart');
        if ($card[$index]['id'] == $id) {
            unset($card[$index]);
        }
        session()->put('cart',$card);
    }

    public function cart_checkout(Request $request)
    {
        if (Auth::check()) {
            $jk = explode(",",$request->qty);
            $cart = session()->pull('cart');
            for ($i=0;$i<count($cart);$i++) {
                if ($cart[$i]['quantity'] != $jk[$i]) {
                    $int = (int)$jk[$i];
                    $cart[$i]['quantity'] = $int;
                }
            }
            $car2t = session()->put('cart',$cart);
            return "done";
        }
        else{
            return "login-failed";
        }
    }

    public function place_order(Request $request)
    {
        function random_strings($length_of_string){
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($str_result),0, $length_of_string);
        }
        $product = session()->get('cart');
        $total = 0;
        foreach ($product as $value) {
            $total = $total+$value['price']*$value['quantity'];
        }
        Order::create([
            'user_id'=> Auth::user()->id,
            'order_code'=> random_strings(20),
            'address'=> $request->address,
            'note'=> $request->note,
            'product'=> json_encode($product),
            'total'=>$total,
            'payment_methode'=> $request->payment,
        ]);
        
        if (session()->has('cart')) {
            session()->forget('cart');
        }

        return "Your order has been saved!";

    }
}
