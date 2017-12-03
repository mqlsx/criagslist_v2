@extends('layouts.default')
@section('title', 'products list')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h1>Product list</h1>
  <form action="{{ route('products.search') }}" method='POST'>
  	{{ csrf_field() }}
  	<input type='text' name='name' placeholder='name'>
  	
  	{{ Form::select('category', array('' => 'category', 'book' => 'book', 'arts' => 'arts')) }}
  	<input type='number' name='min-price' placeholder='min price' step="0.01" min="0">
  	<input type='number' name='max-price' placeholder='max price' step="0.01" min="0">
  	<button type='submit'>update search</button>
  </form>


  <ul class="products">
    @foreach ($products as $product)
      @include('products._product_info_link')
    @endforeach
  </ul>

  {!! $products->render() !!}
</div>   

 
@stop