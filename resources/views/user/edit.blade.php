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
			Edit profile
		</h2>
	</section>	

	<!-- Content page -->
	<div class="container emp-profile">
        <form method="POST" action="{{ route('updateUser', $user->id)}}" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4">
					<div class="profile-img">
						<img src="{{ asset('images/'.$user->avatar) }}" alt="" id="content"/>
						<div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="avatar"/>
                        </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="profile-head">
						<h3>
							{{$user->username}}
                        </h3>
                    </br></br>
                        <p class="proile-rating">NUMBER OF ORDERS : <span>{{$user->orders->count()}}</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Information </a>
                            </li>
                        </ul>
                    </div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
					<div class="tab-content profile-tab" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{$user->username}}" required>
                                </div>
                            </div>
                            </br>
							<div class="row">
								<div class="col-md-3">
									<label>Name</label>
								</div>
								<div class="col-md-6">
                                    <input type="text" class="form-control" name="fullname" placeholder="Name" value="{{$user->fullname}}">
								</div>
                            </div>
                            </br>
							<div class="row">
								<div class="col-md-3">
									<label>Phone</label>
								</div>
								<div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="Phone" value="{{$user->phone}}">
								</div>
                            </div>
                            </br>
							<div class="form-group row">
								<div class="col-md-3">
									<label>Address</label>
								</div>
								<div class="col-md-6">
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{$user->address}}">
                                </div>
                            </div>
							</br>
							
							<div class="form-group row">
								<div class="col-md-3">
									<label>Password</label>
								</div>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>
							</br>

							<div class="form-group row">
								<div class="col-md-3">
									<label>Password Confirmation</label>
								</div>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmation">
								</div>
							</div>
							</br>
                            <div class="row">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
						</div>					

					</div>
				</div>
            </div>
        </form>
    </div>
    
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <script>
                var error = <?php echo json_encode($error, JSON_HEX_TAG); ?>;
                document.getElementById("content").addEventListener("load", errorMessage);

                function errorMessage() {
                    swal("", error, "warning");
                }
            </script>
        @endforeach
    @endif

@endsection