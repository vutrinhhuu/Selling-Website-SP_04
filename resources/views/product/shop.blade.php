@extends('layouts/master')
@section('content')
<!-- Cart -->
    @include('layouts/cart')

    @include('product.list_products')

@endsection