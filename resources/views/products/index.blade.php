@extends('layouts.default')
@section('title', 'products list')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h1>Product list</h1>
  <ul class="products">
    @foreach ($products as $product)
      @include('products._product_info_link')
    @endforeach
  </ul>

  {!! $products->render() !!}
</div>    
@stop