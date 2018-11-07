<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size_colors extends Model
{
    protected $table = "size_colors";
    
       public function product(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
