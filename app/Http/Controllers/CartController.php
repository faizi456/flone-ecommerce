<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    //  product detail page
    public function product_detail($id)
    {
        $product = Product::where('product_id',$id)->first();
        return view("user.product_detail",['product'=>$product]);
    }
    
    // cart page
    public function cart(){
        $mac = session('mac');
        $cart_products = Cart::where('mac',$mac)->whereNull('order_number')->get();
        return view("user.cart",['cart_products'=>$cart_products]);
    }

    // Variation product price and color
    public function getProductPrice(Request $request){
        $data = $request->all();
        $array = explode('-',$data['sizeAndId']);
        // echo $array[0];  having id
        // echo $array[1];  having size

        $product = Product::where('product_id',$array[0])->first();
        $unitPrice = unserialize($product->unitPrice);
        $colors = unserialize($product->color);
        // price available
        foreach($unitPrice as $key=>$value){
            if($key == $array[1]){
                $price = $value;
            }
        }
        // colors available
        foreach($colors as $key=>$value){
            if($key == $array[1]){
                $color = $value;
            }
        }
        return response()->json([
            'id'=>$array[0],
            'price'=>$price,
            'color'=>$color,
            'size'=>$array[1],
        ]);
    }

    
    public function addProductTocart(Request $req){
        $mac = session('mac');
        $cart = Cart::where('product_id',$req->product_id)->get();
        if(count($cart) > 0){
            echo 'Product already exist! <a href="/cart" style="font-weight:bold; font-size:14px; color:#a749ff;">View Cart</a>';
            die;
        }
        else{
            $product = Product::where('product_id',$req->product_id)->first();
            $pro_image = explode(',',$product->images);
            if($product->product_type == "Single Product"){
                $cart = new Cart;
                $cart->product_id = $req->product_id;
                $cart->product_type = $product->product_type;
                $cart->product_name = $product->product_name;
                $cart->product_code = $product->product_code;
                $cart->unitPrice = $product->unitPrice;
                $cart->quantity = $req->quantity;
                $cart->subtotal = $product->unitPrice*$req->quantity;
                $cart->mac = $mac;
                $cart->image = $pro_image[0];
                if($cart->save()){
                    return response()->json(['success' => 'Product is added successfully! <a href="/cart" style="font-weight:bold; font-size:14px; color:#a749ff;">View Cart</a>']);
                }
                else{
                    echo 'Some error occured. Please try again!';
                    die;
                }
            }
            else{
                if($req->product_price == ""){
                    echo 'Please select size to proceed!';
                    die;
                }
                $cart = new Cart;
                $cart->product_id = $req->product_id;
                $cart->product_type = $product->product_type;
                $cart->product_name = $product->product_name;
                $cart->product_code = $product->product_code;
                $cart->unitPrice = $req->product_price;
                $cart->size = $req->product_size;
                $cart->color = $req->product_color;
                $cart->quantity = $req->quantity;
                $cart->subtotal = $req->product_price*$req->quantity;
                $cart->mac = $mac;
                $cart->image = $pro_image[0];
                if($cart->save()){
                    return response()->json(['success' => 'Product is added successfully! <a href="/cart" style="font-weight:bold; font-size:14px; color:#a749ff;">View Cart</a>']);
                }
                else{
                    echo 'Some error occured. Please try again!';
                    die;
                }   
            }
        }
    }

    public function updateCart(Request $request){
        $mac = session('mac');
        $array=[
            'quantity' => $request->quantity,
            'subtotal' => $request->quantity*$request->unitPrice,
        ];
        Cart::where('id',$request->cart_id)->update($array);
        $total = Cart::where('mac',$mac)->sum('subtotal');
        return response()->json([
            'subtotalPrice' => $request->quantity*$request->unitPrice,
            'total' => $total,
        ]);
    }

    public function delete_single_item(Request $request){
        $mac = session('mac');
        Cart::where('id',$request->id)->delete();
        $total = Cart::where('mac',$mac)->sum('subtotal');
        return response()->json([
            'success'=>'deleted',
            'total'=>$total,
        ]);
    }

    public function empty_cart(){
        $mac = session('mac');
        Cart::where('mac',$mac)->delete();
        $total = Cart::where('mac',$mac)->sum('subtotal');
        return response()->json([
            'success'=>'deleted',
            'total'=>$total,
        ]);
    }
}