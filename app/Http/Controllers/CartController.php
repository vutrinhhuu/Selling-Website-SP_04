<?php
namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\DeliverAddress;
use App\ShippingFees;
use App\PaymentMethod;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Session;

use  App\User;
use Auth;
class CartController extends Controller
{
  

  public function getAddToCart(Request $req,$id,$id_size_color,$num_product){

    $product = Product::find($id);
    $oldCart = Session::get('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);

    $cart->addWithAmount($product,$id,$id_size_color,$num_product);
    $req->session()->put('cart',$cart);
    
    return view('layouts.cart');
  }


  public function getUpdateAmountCart(Request $req,$id,$id_size_color,$num_product){

    $product = Product::find($id);
    $oldCart = Session::get('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);

    $cart->UpdateAmount($product,$id,$id_size_color,$num_product);
    $req->session()->put('cart',$cart);
    
    return view('layouts.cart');
  }

  public function getRemoveFromCart(Request $req,$id,$id_size_color,$num_product){

    $product = Product::find($id);
    $oldCart = Session::get('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);

    $cart->removeWithAmount($product,$id,$id_size_color,$num_product);
    $req->session()->put('cart',$cart);
    
    return view('layouts.cart');
  }


  public function getDelItemCart($id){
    $oldCart = Session::get('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    if(count($cart->items) > 0){
      Session::put('cart',$cart);  
    }
    else{
      Session::forget('cart');
    }
    return redirect()->back();
  }

   public function viewCart(){
      
      return view('cart.show');
  }

  public function getCheckOut(){
    $shipping_fees = ShippingFees::all();
    $payment_methods = PaymentMethod::all();
    return view('cart.checkout',compact('shipping_fees','payment_methods'));
  }

  public function postCheckOut(Request $req){ 
    if (Auth::check() ){
      $user = Auth::user();
    }

    $cart = Session::get('cart');

    $shipping_fee = ShippingFees::Where('id',$req->province_city)->first()->shipping_fee;

    $order = new Order;
    $order->note = $req->note;
    $order->total = $cart->totalPrice + $shipping_fee;
    $order->shipping_fee = $shipping_fee;

    $order->order_day = date('Y-m-d'); 
    $order->user_id = $user->id; 
    $order->name_receiver = $req->name_receiver;
    $order->phone_receiver = $req->phone_receiver;
    $order->payment_method_id = $req->payment_method_id;
    $order->save();


    foreach($cart->items as $key => $value){
      $order_detail = new OrderDetail;
      $order_detail->quantity = $value['qty'];
      $order_detail->sold_price = $value['item']['promotion_price'];  
      $order_detail->order_id = $order->id;
      $order_detail->size_color_id = $key;
      $order_detail->save();
    }
    

    $deliver_address =  new DeliverAddress;
    $deliver_address->order_id = $order->id;
    $deliver_address->province_city = $req->province_city;
    $deliver_address->county_district = $req->country_district;
    $deliver_address->other_address_details = $req->other_address_details;
    $deliver_address->save();

    //tru so luong trong kho
    Session::forget('cart');
    return view('cart.checkout_success');
  }
}
 
?>
