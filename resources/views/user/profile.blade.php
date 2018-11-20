@extends('layouts/master')
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')

	<!-- Cart -->
	@include('layouts/cart')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			My profile
		</h2>
	</section>	

	<!-- Content page -->
	<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Kshiti Ghelani
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Purchase history</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti Ghelani</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>kshitighelani@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            			<div class="row">
											<div class="table-responsive">
										      <table class="table table-bordered">
										        <thead>
										          <tr>
										            <th>Id</th>
										            <th>Note</th>
										            <th>Total</th>
										            <th>Order day</th>
										            <th>Payment status</th>
										            <th>Payment day</th>
										            <th>Payment method</th>
										            <th>Deliver status</th>
										            <th>Deliver day</th>
										            <th>Action</th>
										          </tr>
										        </thead>
										        <tbody>
										        	@if(!empty($orders))
											          	@foreach($orders as $order)
							                                <tr>
							                                    <td>{{$order->id}}</td>
							                                    <td>{{$order->note}}</td>
							                                    <td>{{$order->total}} VND</td>
							                                    <td>{{$order->order_day}}</td>
							                                    @if($order->payment_status == 0)
											                        <td>Not payed</td>
											                    @elseif($order->payment_status == 1)
											                    	<td>Payed</td>
											                    @endif
											                    <td>{{$order->payment_day}}</td>
							                                    <td>{{$order->payment_method->name}}</td>
							                                    @if($order->deliver_status == 0)
											                        <td>Not delived</td>
											                    @elseif($order->deliver_status == 1)
											                    	<td>Delivered</td>
											                    @endif
							                                    <td>{{$order->deliver_day}}</td>
							                                    <td class="center"><a type="button" class="btn btn-success" data-toggle="modal" data-target="#orderDetailModal" href="user/order/{{$order->id}}">View</a></td>
							                                </tr>
							                            @endforeach
						                            @endif
										        </tbody>
										      </table>
									    	</div>
										</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
	
	<!-- Modal -->
<div id="orderDetailModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <!-- Shoping Cart -->
		<form class="bg0 p-t-75 p-b-85">
			<div class="container">
				<div class="row">
					<table class="table-shopping-cart">
						<tr class="table_head">
							<th class="column-1">Product</th>
							<th class="column-2"></th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						@if(!empty($orderDetails))
							@foreach($orderDetails as $orderDetail)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-04.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$orderDetail->product->name}}</td>
									<td class="column-3">{{$orderDetail->sold_price}} VND</td>
									<td class="column-4">{{$orderDetail->quantity}}</td>
									<td class="column-5">{{$orderDetail->quantity * $orderDetail->sold_price}} VND</td>
								</tr>
							@endforeach
						@endif
					</table>
				</div>
			</div>
		</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})

	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
</html>
@endsection