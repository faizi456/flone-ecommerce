<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sitecontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// user side
Route::get('/',[FrontendController::class,'index']);
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/aboutUs',[FrontendController::class,'aboutUs']);
Route::get('/contactUs',[FrontendController::class,'contactUs']);
Route::get('/viewCategory/{id}',[FrontendController::class,'viewCategory'])->name("viewCategory");
Route::get('/viewSubCategory/{id}',[FrontendController::class,'viewSubCategory'])->name("viewSubCategory");
Route::get('/product-detail/{id}',[CartController::class,'product_detail'])->name("productDetail");
Route::get('/cart',[CartController::class, 'cart']);
Route::get('/cart/{id}',[CartController::class, 'addTocart'])->name("cart");




// admin side
// login
Route::get('/login',[sitecontroller::class,'login'])->name("login");
Route::post('/login',[sitecontroller::class,'getLogin'])->name("getLogin");
Route::group(['middleware'=>'AdminAuth'], function(){
    // dashboard
    Route::get('/admindash', [sitecontroller::class,'admindash'])->name("admindash");
    // category
    Route::resource('/category', CategoryController::class);
    // supplier
    Route::resource('/supplier', SupplierController::class);
    // subcategory
    Route::resource('/subcategory', SubcategoryController::class);
    // product attributes
    Route::resource('/attributes', AttributeController::class);
    Route::resource('/attribute-value', AttributeValueController::class);
    // products
    Route::resource('/product', ProductController::class);
    // New Admin register
    Route::resource('/admin/register', AdminRegisterController::class);
    // logout
    Route::get('/logout',[sitecontroller::class,'logout'])->name("logout");
});

