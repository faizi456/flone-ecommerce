<?php
use Illuminate\Support\Facades\DB;

function getCategories(){
    return DB::table("categories")->get();
}
function getCartCount(){
    $mac = session('mac');
    return DB::table("cart")->where('mac',$mac)->count();
}
?>