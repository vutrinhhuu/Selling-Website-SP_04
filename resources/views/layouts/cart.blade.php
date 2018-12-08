
<div class="wrap-header-cart js-panel-cart">
  <div class="s-full js-hide-cart"></div>

  <div class="header-cart flex-col-l p-l-65 p-r-25">
    <div class="header-cart-title flex-w flex-sb-m p-b-8">
      <span class="mtext-103 cl2">
        Your Cart
      </span>

      <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
        <i class="zmdi zmdi-close" id="close_cart"></i>
      </div>
    </div>

    <div class="header-cart-content flex-w js-pscroll">
      <ul class="header-cart-wrapitem w-full">


        @if(Session::has('cart'))
       
           @foreach($product_cart as $key=> $product)
            <li class="header-cart-item flex-w flex-t m-b-12">
              <div class="header-cart-item-img">
                <a href="{{route('deletecart',$key )}}"><img src="{{ asset('images/'.$product['item']['representative_image'])}}"
                width="60" alt="IMG"></a>
              </div>

              <div class="header-cart-item-txt p-t-8">
                <a href="{{route('detailsproduct',$product['item']['id'])}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                 {{$product['item']['name']}} <br/>
                 ({{$product['size_color']['size']}} - {{$product['size_color']['color']}})
                </a>
                <span class="header-cart-item-info">
                  {{$product['qty']}} x {{number_format($product['item']['promotion_price'])}} VND
                </span>
              </div>
            </li>
          @endforeach
        @endif
      </ul>

      <div class="w-full">
        <div class="header-cart-total w-full p-tb-40">
          @if(Session::has('cart'))
          Total: {{number_format(Session('cart')->totalPrice)}} VND
          @else
          Total: 0 VND
          @endif
        </div>

        <div class="header-cart-buttons flex-w w-full">
          @if(Session::has('cart'))
          <a href="{{route('viewcart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            View Cart
          </a>
         <!--  <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
             </a> -->
          @else
             <button  class="show-empty-cart flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            View Cart
          </button>
          <!-- <button class="show-empty-cart flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
             </button> -->
          @endif
         
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on('click', '.show-empty-cart', function () {
    console.log("empty cart");
    swal("", "cart is empty", "info");
});  
</script>

