<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
    // Index page
    public function index(){
        $categories = Category::all();
        return view("user.index",['categories'=>$categories]);
    }
    // Shop Page
    public function shop(){
        $categories = Category::all();
        return view("user.shop",['categories'=>$categories]);
    }
    // About US Page
    public function aboutUs(){
        $categories = Category::all();
        return view("user.aboutUs",['categories'=>$categories]);
    }
    // Contact Us Page
    public function contactUs(){
        $categories = Category::all();
        return view("user.contactUs",['categories'=>$categories]);
    }

}
