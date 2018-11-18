<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function deliver_address()
    {
        return $this->hasOne(DeliverAddress::class);
    }
}
