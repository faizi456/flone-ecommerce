<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Session;

class CartController extends Controller
{

    public function product_detail($id)
    {
        $product = Product::where('product_id',$id)->first();
        return view("user.product_detail",['product'=>$product]);
    }

    public function cart(){
        $mac = session('mac');
        $cart_products = Cart::where('mac',$mac)->pluck('product_id');
        $products = Product::whereIn('product_id',$cart_products)->get();
        return view("user.cart",['cart_products'=>$products]);
    }
    
    public function addTocart(Request $req, $id){
        $mac = session('mac');
        dd($mac);
        // $product = Product::find($id);
        // if($product){
        //     $cart = Cart::where('product_id',$id)->get();
        //     if(count($cart) > 0){
        //         Session::flash('error_message', 'Product already exist. Kindly <a href="/cart" style="font-weight:bolder; font-size:16px;">visit Cart</a>!');
        //         return back();
        //     }
        //     else{
        //         if($product->product_type == "Single Product"){
        //             $cart = new Cart;
        //             $cart->product_id = $id;
        //             $cart->product_type = $product->product_type;
        //             $cart->product_name = $product->product_name;
        //             $cart->product_code = $product->product_code;
        //             $cart->unitPrice = $product->unitPrice;
        //             $cart->srp = $product->srp;
        //             $cart->mac = $mac_address;
        //             if($cart->save()){
        //                 Session::flash('success_message', 'Product is added successfully! <a href="/cart" style="font-weight:bolder; font-size:16px;">View Cart</a>');
        //                 return back();
        //             }
        //             else{
        //                 Session::flash('error_message', 'Some error occured. Please try again!');
        //                 return back();
        //             }
        //         }
        //         else{
        //            dd($product->product_type); 
        //         }
        //     }
        // }
        // else{
        //     Session::flash('error_message', 'Some error occured. Please try again!');
        //     return back();
        // }
    }

}
