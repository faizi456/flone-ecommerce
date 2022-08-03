<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $primaryKey = "sub_id";
    
    public function cat(){
        return $this->belongsTo('App\Models\Category','main_cat','id');
    }


}
