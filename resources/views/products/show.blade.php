@extends('layouts.default')
@section('title', $product->name)
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-12">
      <div class="col-md-offset-2 col-md-8">
        <section class="user_info">
          @include('products._product_info', ['product' => $product])
        </section>
        
        @can('destroy', $product)
	      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
	        {{ csrf_field() }}
	        {{ method_field('DELETE') }}
	        <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Delete</button>
	      </form>

	      <a href="{{ route('products.edit', $product->id) }}">
	        <button class="btn btn-sm btn-normal">Edit</button>
	      </a>
  		@endcan
      </div>
    </div>

    
  </div>
</div>
@stop