<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.product.index", [
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $suppliers = Supplier::all();
        return view("admin.product.create",[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
            'suppliers'=>$suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("ddsds");
        $product = new Product;
        if($request->input("product_type") == "Single Product"){
            $product->product_type = $request->input("product_type");
            $product->product_name = $request->input("product_name");
            $product->product_code = $request->input("product_code");
            $product->description = $request->input("description");
            $product->mainCategory = $request->input("mainCategory");
            $product->subCategory = $request->input("subCategory");
            $product->supplier = $request->input("supplier");
            $product->unitPrice = $request->input("unitPrice");
            $product->srp = $request->input("srp");
            $product->quantityType = $request->input("quantityType");
            $product->stock = $request->input("stock");
            $product->status = $request->input("status");
            // Image
            $images = array();
            if($files = $request->file("images")){
                foreach($files as $file){
                    $images_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $images_full_name = $images_name.'.'.$ext;
                    $upload_path = storage_path().'/app/public/products/';
                    $images_url = $images_full_name;
                    $file->move($upload_path,$images_full_name);
                    $images[] = '/storage/products/'.$images_url;
                }
            }
            $product->images = implode(',', $images);

            $product->save();

            return response()->json(['res' => "success"]);
        }
        else{
               // Atribute Images
                $attr_images = array();
                if($image_files = $request->file("attr_images")){
                    foreach($image_files as $file_data){
                        $ext = strtolower($file_data->getClientOriginalExtension());
                        $images_full_name = md5(rand(1000,10000)).'.'.$ext;
                        $file_data->move(storage_path().'/app/public/products/' ,$images_full_name);
                        $attr_images[] = '/storage/products/'.$images_full_name;
                    }
                }
                $variation_images = implode(',', $attr_images);
                // Stock
                $attr_stock = $request->input("stock");
                $variation_stocks = array();
                foreach($request->input("size") as $key=>$d){
                    $variation_stocks[$d]=$attr_stock[$key];
                }
                $variation_stock = serialize($variation_stocks);
                // // SRP
                $attr_srp = $request->input("srp");
                $variation_srp = array();
                foreach($request->input("size") as $key=>$d){
                    $variation_srp[$d]=$attr_srp[$key];
                }
                $variation_srps = serialize($variation_srp);
                // unitPrice
                $attr_unitPrice = $request->input("unitPrice");
                $variation_unitPrice = array();
                foreach($request->input("size") as $key=>$d){
                    $variation_unitPrice[$d]=$attr_unitPrice[$key];
                }
                $variation_unitPrices = serialize($variation_unitPrice);
                // size
                $attr_size = $request->input("size");
                $variation_size = implode(',', $attr_size);
                // color
                $attr_color = $request->input("color");
                $variation_color= array();
                foreach($request->input("size") as $key=>$d){
                    $variation_color[$d]=$attr_color[$key];
                }
                $variation_colors = serialize($variation_color);
                // quantityType
                $attr_quantityType = $request->input("quantityType");
                $variation_quantityType=array();
                foreach($request->input("size") as $key=>$d){
                    $variation_quantityType[$d]=$attr_quantityType[$key];
                }
                $variation_quantityTypes = serialize($variation_quantityType);

                $product->product_type = $request->input("product_type");
                $product->product_name = $request->input("product_name");
                $product->product_code = $request->input("product_code");
                $product->description = $request->input("description");
                $product->mainCategory = $request->input("mainCategory");
                $product->subCategory = $request->input("subCategory");
                $product->supplier = $request->input("supplier");
                $product->status = $request->input("status");
                $product->images = $variation_images;
                $product->stock = $variation_stock;
                $product->srp = $variation_srps;
                $product->unitPrice = $variation_unitPrices;
                $product->quantityType = $variation_quantityTypes;
                $product->size = $variation_size;
                $product->color = $variation_colors;
                $product->save();
                
                return response()->json(['res' => 'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $product = Product::where('product_id',$product_id)->first();
        if($product->product_type == "Variation Product"){
            return view("admin.product.viewVariationProduct",[
                'product'=>$product,
            ]);
        }
        else{
            return view("admin.product.viewSingleProduct",[
                'product'=>$product,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Product::where('product_id',$product_id)->first();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $suppliers = Supplier::all();
        if($product->product_type == "Variation Product"){
            return view("admin.product.UpdateVariationProduct",[
                'categories'=>$categories,
                'subcategories'=>$subcategories,
                'suppliers'=>$suppliers,
                'product'=>$product,
            ]);
        }
        else{
            return view("admin.product.UpdateSingleProduct",[
                'categories'=>$categories,
                'subcategories'=>$subcategories,
                'suppliers'=>$suppliers,
                'product'=>$product,
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        if($request->product_type=="Variation Product"){
            // Atribute Images
            $attr_images = array();
            if($image_files = $request->file("attr_images")){
                foreach($image_files as $file_data){
                    $ext = strtolower($file_data->getClientOriginalExtension());
                    $images_full_name = md5(rand(1000,10000)).'.'.$ext;
                    $file_data->move(storage_path().'/app/public/products/' ,$images_full_name);
                    $attr_images[] = '/storage/products/'.$images_full_name;
                }
                $new_images = implode(',', $attr_images);
            }
            else{
                $new_images = $request->input("old_images");
            }
            // Stock
            $attr_stock = $request->input("stock");
            $variation_stocks = array();
            foreach($request->input("size") as $key=>$d){
                $variation_stocks[$d]=$attr_stock[$key];
            }
            $variation_stock = serialize($variation_stocks);
            // // SRP
            $attr_srp = $request->input("srp");
            $variation_srp = array();
            foreach($request->input("size") as $key=>$d){
                $variation_srp[$d]=$attr_srp[$key];
            }
            $variation_srps = serialize($variation_srp);
            // unitPrice
            $attr_unitPrice = $request->input("unitPrice");
            $variation_unitPrice = array();
            foreach($request->input("size") as $key=>$d){
                $variation_unitPrice[$d]=$attr_unitPrice[$key];
            }
            $variation_unitPrices = serialize($variation_unitPrice);
            // size
            $attr_size = $request->input("size");
            $variation_size = implode(',', $attr_size);
            // color
            $attr_color = $request->input("color");
            $variation_color= array();
            foreach($request->input("size") as $key=>$d){
                $variation_color[$d]=$attr_color[$key];
            }
            $variation_colors = serialize($variation_color);
            // quantityType
            $attr_quantityType = $request->input("quantityType");
            $variation_quantityType=array();
            foreach($request->input("size") as $key=>$d){
                $variation_quantityType[$d]=$attr_quantityType[$key];
            }
            $variation_quantityTypes = serialize($variation_quantityType);

            $product->product_type = $request->input("product_type");
            $product->product_name = $request->input("product_name");
            $product->product_code = $request->input("product_code");
            $product->description = $request->input("description");
            $product->mainCategory = $request->input("mainCategory");
            $product->subCategory = $request->input("subCategory");
            $product->supplier = $request->input("supplier");
            $product->status = $request->input("status");
            $product->images = $new_images;
            $product->stock = $variation_stock;
            $product->srp = $variation_srps;
            $product->unitPrice = $variation_unitPrices;
            $product->quantityType = $variation_quantityTypes;
            $product->size = $variation_size;
            $product->color = $variation_colors;
            $product->update();
            
            return response()->json(['res' => 'success']);   
        }
        else{
            $new_images = array();
            if($image_files = $request->file("images")){
                foreach($image_files as $file_data){
                    $ext = strtolower($file_data->getClientOriginalExtension());
                    $images_full_name = md5(rand(1000,10000)).'.'.$ext;
                    $file_data->move(storage_path().'/app/public/products/' ,$images_full_name);
                    $new_images[] = '/storage/products/'.$images_full_name;
                }
                $images = implode(',', $new_images);
            }
            else{
                $images = $request->input("old_images");
            }
            $product->product_type = $request->input("product_type");
            $product->product_name = $request->input("product_name");
            $product->product_code = $request->input("product_code");
            $product->description = $request->input("description");
            $product->mainCategory = $request->input("mainCategory");
            $product->subCategory = $request->input("subCategory");
            $product->supplier = $request->input("supplier");
            $product->unitPrice = $request->input("unitPrice");
            $product->srp = $request->input("srp");
            $product->quantityType = $request->input("quantityType");
            $product->stock = $request->input("stock");
            $product->images = $images;
            $product->status = $request->input("status");
            if($product->update()){
                Session::flash('success_message','Product is updated successfully!');
                return back();
            }
            else{
                Session::flash('error_message','Product is not updated!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['status' => "success"]);
    }
}
