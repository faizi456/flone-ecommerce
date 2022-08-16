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

    public function cart(){
        $mac = session('mac');
        $cart_products = Cart::where('mac',$mac)->pluck('product_id');
        $products = Product::whereIn('product_id',$cart_products)->with(['cat:name,id','subcat:subcat_name,id'])->get();
        return view("user.cart",['cart_products'=>$products]);
    }
    
    public function addProductTocart(Request $req){
        $mac = session('mac');
        $product = Product::find($req->product_id);
        if($product){
            $cart = Cart::where('product_id',$req->product_id)->get();
            if(count($cart) > 0){
                echo "Product already exist";
                die;
            }
            else{
                if($product->product_type == "Single Product"){
                    $cart = new Cart;
                    $cart->product_id = $req->product_id;
                    $cart->product_type = $product->product_type;
                    $cart->product_name = $product->product_name;
                    $cart->product_code = $product->product_code;
                    $cart->unitPrice = $product->unitPrice;
                    $cart->quantity = $req->quantity;
                    $cart->mac = $mac;
                    if($cart->save()){
                        return response()->json(['success' => 'Product is added successfully!']);
                    }
                    else{
                        echo "Product is not added";
                        die;
                    }
                }
                else{
                    $cart = new Cart;
                    $cart->product_id = $req->product_id;
                    $cart->product_type = $product->product_type;
                    $cart->product_name = $product->product_name;
                    $cart->product_code = $product->product_code;
                    $cart->unitPrice = $req->product_price;
                    $cart->size = $req->product_size;
                    $cart->color = $req->product_color;
                    $cart->quantity = $req->quantity;
                    $cart->mac = $mac;
                    if($cart->save()){
                        return response()->json(['success' => 'Product is added successfully!']);
                    }
                    else{
                        echo "Product is not added";
                        die;
                    }   
                }
            }
        }
        else{
            echo "Some error occured.";
            die;
        }
    }

}
