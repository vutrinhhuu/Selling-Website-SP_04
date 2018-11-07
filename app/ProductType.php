<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "categories";
    public function product(){
    	return $this->hasMany('App\Product','category_id','id');
    }
}
