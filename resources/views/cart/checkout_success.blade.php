@extends('layouts.master')

@section('content')

<div class="container" style="padding-top: 100px;padding-bottom: 200px">
  	<h2>Thank you for shopping with us!</h2>
  	<h6>You can check your orders at <a href="{{ route('user', $user->id) }}">my orders</a></h6>

</div>

@endsection