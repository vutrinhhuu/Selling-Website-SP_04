<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = "order_details";

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function size_color()
  {
    return $this->belongsTo(SizeColors::class);
  }
}
