<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";

    
    // Main Category
    public function cat(){
        return $this->belongsTo('App\Models\Category','mainCategory','id');
    }
    // Sub Category
    public function subcat(){
        return $this->belongsTo('App\Models\Subcategory','subCategory','sub_id');
    }
    // Supplier
    public function sup(){
        return $this->belongsTo('App\Models\Supplier','supplier','id');
    }
    
}

