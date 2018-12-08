@extends('layouts.master')

@section('content')
    @include('layouts.cart')

     <!-- breadcrumb -->
    <div class="container" style="padding-top: 100px">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <!--LIST PRODUCT IN CART -->
                            <table class="table-shopping-cart" >
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                 @if(Session::has('cart'))
                                    @foreach($product_cart as $key=> $product)           
                                    <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1 ">
                                             <a href="{{route('deletecart',$key )}}">
                                            <img src="{{ asset('images/'.$product['item']['representative_image'])}}" alt="IMG"></a>
                                        </div>
                                    </td>
                                    <td class="column-2">
                                         <a href="{{route('detailsproduct',$product['item']['id'])}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{$product['item']['name']}} <br/>
                                        ({{$product['size_color']['size']}} - {{$product['size_color']['color']}})
                                        </a>
                                    </td>
                                    <td class="column-3">
                                        {{number_format($product['item']['promotion_price'])}}
                                    </td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <input id="db_num_product" style="display: none;" value="{{$product['size_color']['quantity']}}">
                                            <input id="id_size_color" style="display: none;" value="{{$product['size_color']['id']}}">
                                            <input id="product_id" style="display: none;" value="{{$product['item']['id']}}">

                                            <div class="btn-num-product-down calculate-total-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>  
                                            </div>
                                         
                                            <input class="mtext-104 cl3 txt-center num-product update_product_amount" type="number" name="num-product1" value="{{$product['qty']}}">

                                            <div class="btn-num-product-up calculate-total-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5"> {{number_format($product['qty']*$product['item']['promotion_price'])}}</td>
                                   
                                    </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                                    
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                     @if(Session::has('cart'))
                                        {{number_format(Session('cart')->totalPrice)}} VND
                                    @else
                                        0 VND
                                    @endif
                                </span>
                            </div>
                        </div>
                   
                    
                        @if (Auth::user())
                         <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"> Proceed to Checkout</a>
                        @else
                         <a href="#" class=" no-user-loggined flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"> Proceed to Checkout</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript">
    
    $(document).on('click', '.no-user-loggined', function () {
        swal("You havent logined yet?", "Login to continue", "error");
    });  

    $(document).on('click', '.calculate-total-up',function(){
        var num_product = 1;
        var product_id = Number($(this).prev().prev().prev().val());
        var id_size_color = Number($(this).prev().prev().prev().prev().val());
        var current_amount = Number($(this).prev().val());
        var db_num_product = Number($(this).prev().prev().prev().prev().prev().val());
        
        if(current_amount  <= 0){
            swal("amount should be more than 0","Please choose again","error");
        }else if(current_amount > db_num_product){
             swal("not enough product","Just has "+db_num_product+" this product","info");
        }else{
            
            url_add_to_cart = '/add-to-cart/'+product_id+'/'+id_size_color+'/'+num_product;
              //update cart and total quantity in cart
           
            $.ajax({
                data: {},
                url:url_add_to_cart,
                success: function(result){
                  location.reload();
                }
            });
        }
    });

    $(document).on('change','.update_product_amount',function(){
        var num_product = Number($(this).val());
        var product_id = Number($(this).prev().prev().val());
        var id_size_color = Number($(this).prev().prev().prev().val());
        var db_num_product = Number($(this).prev().prev().prev().prev().val());
        
        if(num_product  <= 0){
            swal("amount should be more than 0","Please choose again","error");
        }else if(num_product >db_num_product){
           swal("not enough product","Just has "+db_num_product+" this product","info");
        }else{
            update_amount_cart = '/update-amount-cart/'+product_id+'/'+id_size_color+'/'+num_product;
          //update cart and total quantity in cart
         
        $.ajax({
            data: {},
            url:update_amount_cart,
            success: function(result){
              location.reload();
            }
        });
        }
        
    });

    $(document).on('click', '.calculate-total-down',function(){
        var num_product = 1;
        var product_id = Number($(this).prev().val());
        var id_size_color = Number($(this).prev().prev().val());
        var current_amount = Number($(this).next().val());
        var db_num_product = Number($(this).prev().prev().prev().val());
        
        if(current_amount  <= 0){
            swal("amount should be more than 0","Please choose again","error");
        }else if(current_amount > db_num_product){
            swal("not enough product","Just has "+db_num_product+" this product","info");
        }else{
            url_remove_from_cart = '/remove-from-cart/'+product_id+'/'+id_size_color+'/'+num_product;
              //update cart and total quantity in cart
            console.log(url_remove_from_cart);
            $.ajax({
                data: {},
                url:url_remove_from_cart,
                success: function(result){
                  location.reload();
                }
            });
        }
    });

 </script>
