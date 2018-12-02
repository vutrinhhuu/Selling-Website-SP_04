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
											<select name="province_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option value="1">City 1</option>
												<option value="2">City 2</option>
												<option value="3">City 3</option>
												<option value="4">City 4</option>
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
											<!-- Ward -->
											<label for="checkout_province">Commune*</label>
											<select name="commune" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option value="1"> Ward 1</option>
												<option value="2"> Ward 2</option>
												<option value="3"> Ward 3</option>
												<option value="4"> Ward 4</option>
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
															<div class="cart_extra_total_value ml-auto">Free</div>
														</li>
														<li class="d-flex flex-row align-items-center justify-content-start">
															<div class="cart_extra_total_title">Total</div>
															<div class="cart_extra_total_value ml-auto">
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
														<label class="payment_option clearfix">Cash On Delivery
															<input type="radio" checked="checked" name="payment_method_id" value="1" >
															<span class="checkmark"></span>
														</label>

														<label class="payment_option clearfix">Paypal
															<input type="radio" name="payment_method_id" value="2" >
															<span class="checkmark"></span>
														</label>
														
														<label class="payment_option clearfix">Credit card
															<input type="radio" name="payment_method_id" value="3">
															<span class="checkmark"></span>
														</label>
														<label class="payment_option clearfix">Direct bank transfer
															<input type="radio"  name="payment_method_id" value="4">
															<span class="checkmark"></span>
														</label>
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
	@endsection

@endsection
