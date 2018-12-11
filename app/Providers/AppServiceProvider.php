<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Http\Controllers\VoyagerController;
use App\Http\Controllers\AdminController;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
       
        view()->composer('layouts/cart',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=> Session::get('cart'),
                            'product_cart'=>$cart->items,
                            'totalPrice'=>$cart->totalPrice,
                            'totalQty'=>$cart->totalQty]);
                
                $data = $cart;   
            }
        });

         view()->composer('cart/show',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=> Session::get('cart'),
                            'product_cart'=>$cart->items,
                            'totalPrice'=>$cart->totalPrice,
                            'totalQty'=>$cart->totalQty]);
                
                $data = $cart;   
            }
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VoyagerController::class, AdminController::class);
    }
}
