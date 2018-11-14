<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class MoreImages extends Model
{
    //
    protected $table = "more_images";
    public function product(){
    return $this->belongsTo('App\Product','product_id','id');
  }
}
