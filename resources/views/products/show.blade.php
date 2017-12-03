@extends('layouts.default')
@section('title', $product->name)
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-12">
      <div class="col-md-offset-2 col-md-8">
        <section class="favourite">
          @if (Auth::check())
          @include('users._collect_form', ['product' => $product])
          @endif
        </section>

        <section class="product_info">
          @include('products._product_info', ['product' => $product])
        </section>

        <div class="col-md-12" style="padding-left:0;">
        @if (!empty($images) && count($images)>0)
        @include('products._carousel', ['images' => $images])
        @endif
        </div>

        @can('update', $product)
        <a href="{{ route('products.edit', $product->id) }}">
          <button class="btn btn-sm btn-normal">Edit</button>
        </a>

	      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
	        {{ csrf_field() }}
	        {{ method_field('DELETE') }}
	        <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Delete</button>
	      </form>
        @endcan
      </div>
    </div>

    
  </div>
</div>
@stop