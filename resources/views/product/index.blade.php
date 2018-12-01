@extends ('layouts.master')

@section ('content')
  <!-- Cart -->
  @include('layouts.cart')

  <!-- Slider -->
  @include('layouts.slider')

  <!-- Banner -->
  @include('layouts.banner')

  <!-- Product -->
  @include('product.list_products')

@endsection

@section ('modal')
  @include('layouts.modal')
@endsection
