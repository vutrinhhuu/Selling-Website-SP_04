@extends('layouts.master')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('checkout_style/styles/bootstrap-4.1.3/bootstrap.css') }}">
	<link rel="stylesheetcheckout_style/" type="text/css" href="{{ asset('checkout_style/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('checkout_style/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('checkout_style/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('checkout_style/styles/checkout.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('checkout_style/styles/checkout_responsive.css') }}">
@endsection

@section('content')

	<!-- Checkout -->
	<div class="checkout">
		<div class="section_container">


			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5">
						Checkout
					</h3>
				</div>
				<div class="row">
					<div class="col">
						<div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
							<!-- Billing -->
							<div class="billing checkout_box">
								<div class="checkout_title">Billing Address</div>
								<div class="checkout_form_container">
									<form action="{{route('checkout')}}"  method="post" id="checkout_form" class="checkout_form">
										<input type="hidden" name="_token" value="{{csrf_token()}}">

										
											<div>
												<!-- Name -->
												<label for="checkout_name">Full Name*</label>
												<input type="text" id="checkout_name"  name="name_receiver" class="checkout_input" required="required">
											</div>
										
										<div>
											<!-- City / Province -->
											<label for="checkout_city">City*</label>
											<select name="province_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required" onchange="populate(this.id,'shipping_fee','totalPay','totalPayInput')">
												<option></option>
												 @foreach($shipping_fees as $province_city)	
												<option value="{{$province_city->id}}">{{$province_city->province_city}}</option>
												@endforeach
											</select>
										</div>

										<div>
											<!-- Country -->
											<label for="checkout_country">District*</label>
											<select name="country_district" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option value="1">Lithuania</option>
												<option value="2">Sweden</option>
												<option value="3">UK</option>
												<option value="4">Italy</option>
											</select>
										</div>
									

										<div>
											<!-- Details Address -->
											<label for="checkout_address">Address*</label>
											<input name="other_address_details" type="text" id="checkout_address" class="checkout_input" required="required">
										</div>
					
										
										<div>
											<!-- Phone no -->
											<label for="checkout_phone">Phone no*</label>
											<input type="phone" id="checkout_phone" name="phone_receiver" class="checkout_input" required="required">
										</div>

										<div>
											<!-- Email -->
											<label for="checkout_email">Email Address*</label>
											<input type="phone" id="checkout_email" class="checkout_input" required="required">
										</div>
									
										<!-- Cart Total -->
										<div class="cart_total">
											<div class="cart_total_inner checkout_box">
												<div class="checkout_title">Cart total</div>
													<ul class="cart_extra_total_list">
														<li class="d-flex flex-row align-items-center justify-content-start">
															<div class="cart_extra_total_title">Subtotal</div>
															<div class="cart_extra_total_value ml-auto">
																@if(Session::has('cart'))
							                                        {{number_format(Session('cart')->totalPrice)}} VND
							                                    @else
							                                        0 VND
							                                    @endif
															</div>
														</li>
														<li class="d-flex flex-row align-items-center justify-content-start">
															<div class="cart_extra_total_title">Shipping</div>
															<div class="cart_extra_total_value ml-auto" id ="shipping_fee">Free</div>
														</li>
														<li class="d-flex flex-row align-items-center justify-content-start">
															<div class="cart_extra_total_title">Total</div>
															<div class="cart_extra_total_value ml-auto" id="totalPay">
																<input type="hidden" name="totalPayInput" value="0" id="totalPayInput">
																@if(Session::has('cart'))
							                                        {{number_format(Session('cart')->totalPrice)}} VND
							                                    @else
							                                        0 VND
							                                    @endif
															</div>
														</li>
													</ul>

												<!-- Payment Options -->
												<div class="payment">
													<div class="payment_options">
														 @foreach($payment_methods as $p)	
														<label class="payment_option clearfix">{{$p->name}}
															<input type="radio" checked="checked" name="payment_method_id" value="{{$p->id}}" >
															<span class="checkmark"></span>
														</label>
														@endforeach
														
													</div>
												</div>

												<!-- Order Text -->
												<div class="order_text">somethings</div>

												<div >
												<button type="submit" href="#" class="checkout_button trans_200">PLACE ORDER</button>
												</div>

												
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@section('script')
		<script src="{{ asset('checkout_style/js/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('checkout_style/styles/bootstrap-4.1.3/popper.js') }}"></script>
		<script src="{{ asset('checkout_style/styles/bootstrap-4.1.3/bootstrap.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/greensock/TweenMax.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/greensock/TimelineMax.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/greensock/animation.gsap.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/easing/easing.js') }}"></script>
		<script src="{{ asset('checkout_style/plugins/parallax-js-master/parallax.min.js') }}"></script>
		<script src="{{ asset('checkout_style/js/checkout.js') }}"></script>
				
		<script>
		  function populate(s1,s2,s3,s4){
		    var s1 = document.getElementById(s1);
		    var s2 = document.getElementById(s2);
		    var s3 = document.getElementById(s3);
		    var s4 = document.getElementById('totalPayInput');

		    var totalPrice = '<?php echo (Session::has('cart'))?Session('cart')->totalPrice : 0;?>';
		    var shipping_fee = 0;

		    //pass PHP variable to JS
		    var datas = <?php echo json_encode($shipping_fees); ?>;
		    for(i = 0 ;i< datas.length;i++){
		    	if(datas[i].id == s1.value){
		    		shipping_fee = datas[i].shipping_fee;
		    		break;
		    	}
		    }
		    totalPay = parseInt(totalPrice) + parseInt(shipping_fee);

		    s2.innerHTML = numberWithCommas(shipping_fee) + " VND";
		    s3.innerHTML =  numberWithCommas(totalPay) +" VND";

		}
		function numberWithCommas(x) {
    		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
		</script>
	@endsection

@endsection
