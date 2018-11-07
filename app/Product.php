<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function product_type(){
    	return $this->belongsTo('App\ProductType','category_id','id');
    }

    public function more_images(){
    	return $this->hasMany('App\more_images','product_id','id');
    }
}
