<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Order;
use App\OrderDetail;

class UserController extends Controller
{
    public function getProfilePage($userId) {
        $orders = Order::where('user_id', $userId)->get();
    	return view('user.profile', ['orders' => $orders]);
    }

    public function getOrderDetail($orderId) {
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
    	return view('user.profile', compact('orderDetails'));
    }

}
