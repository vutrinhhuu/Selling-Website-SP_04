<?php
namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Session;

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

  public function showCart(){
    //TODO
    return view('cart.show');
  }

  public function checkout(){
    //TODO
    return view('cart.checkout');
  }
}

?>
