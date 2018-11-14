<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = "products";
  public function category(){
    return $this->belongsTo('App\Category','category_id','id');
  }
  public function more_images(){
    return $this->hasMany('App\MoreImages','product_id','id');
  }
  public function size_colors(){
    return $this->hasMany('App\SizeColors','product_id','id');
  }
}
