<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Auth;


class FrontendController extends Controller
{
    // Index page
    public function index(){
        $latest_products = Product::orderBy('product_id', 'desc')->take(4)->get();
        $sale_products = Product::orderBy('product_id', 'asc')->take(4)->get();
        return view("user.index",['latest_products'=>$latest_products, 'sale_products'=>$sale_products]);
    }
    // Shop Page
    public function shop(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view("user.shop",['categories'=>$categories, 'subcategories'=>$subcategories, 'products'=>$products]);
    }
    // About US Page
    public function aboutUs(){
        return view("user.about_us");
    }
    // Contact Us Page
    public function contactUs(){
        return view("user.contact_us");
    }
    // Contact Us Page
    public function viewCategory($id){
        $category = Category::where('id',$id)->first();
        $subcategories = Subcategory::where('main_cat',$id)->get();
        $products = Product::where('mainCategory',$id)->get();
        return view("user.view-category",['category'=>$category, 'subCategories'=>$subcategories, 'products'=>$products]);
    }
    public function viewSubCategory($id){
        $categories = Category::all();
        $subcategory = Subcategory::where('sub_id',$id)->first();
        $products = Product::where('subCategory',$id)->get();
        return view("user.view_subcategory",['categories'=>$categories, 'subcategory'=>$subcategory, 'products'=>$products]);
    }

    public function viewLoginRegister(){
        return view("user.login_register");
    }

}
