@extends('layouts/master')
@section('content') 
 <!-- Cart -->
@include('layouts/cart')
 <!-- Product Details -->
<div class=" p-t-60 p-b-20">
    <div class="container">
      <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
      
        <div class="row">
          <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
              <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>
                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                <div class="slick3 gallery-lb">
                  <div class="item-slick3" data-thumb="{{ asset($product->representative_image) }}">
                    <div class="wrap-pic-w pos-relative">
                      <img src="{{ asset($product->representative_image) }}" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset($product->representative_image) }}">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>
                  
                  @foreach($more_images as $img)
                  <div class="item-slick3" data-thumb="{{ asset($img->image) }}">
                    <div class="wrap-pic-w pos-relative">
                      <img src="{{ asset($img->image) }}" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset($img->image) }}">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
              <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                {{$product->name}}
              </h4>

              <span class="mtext-106 cl2">
                ${{$product->unit_price}}
              </span>

              <p class="stext-102 cl3 p-t-23">
               {{$product->description}}
              </p>

              <!--  -->
              <div class="p-t-33">
                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Size
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select id = "size" name="size" onchange="populate(this.id,'color')"class="js-select2" name="time">
                        <option value="">Choose an option</option>
                          
                        @foreach(array_keys($sizes_colors_quan) as $size)
                        <option value='{{$size}}'>Size {{$size}}</option>
                        @endforeach

                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Color
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select id= "color" name="color" class="js-select2" name="time">
                        <option value="">Choose size first</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-204 flex-w flex-m respon6-next">
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                      Add to cart
                    </button>
                  </div>
                </div>
              </div>

              <!--  -->
              <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                <div class="flex-m bor9 p-r-10 m-r-11">
                  <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                    <i class="zmdi zmdi-favorite"></i>
                  </a>
                </div>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                  <i class="fa fa-facebook"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                  <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
 <!--===============================================================================================-->

<script>
function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  //pass PHP variable to JS
  var data = <?php echo json_encode($sizes_colors_quan); ?>;

  //get size from JSON
  var sizes = [];
  for(var k in data) sizes.push(k);


  //get colors from key:sizes
  for (i = 0; i < sizes.length; i++) { 
    if(s1.value == sizes[i])
      var optionArray = data[sizes[i]];  
  }

  //render option for colors
  for(var option in optionArray){
    var newOption = document.createElement("option");
    newOption.value = option;
    newOption.innerHTML = option;
    s2.options.add(newOption);
  }
}
</script>
<!--===============================================================================================-->

@endsection

