@extends('layouts.default')
@section('title', $user->username)
@section('content')

<div class="col-md-12">
  <section class="collection_info">
    <div>
		<h1>Your Postings</h1>
		<ul class="postings">
			@foreach ($products as $product)
				<li>
					<a href="{{ route('products.show', $product) }}" class="product_name">{{ $product->name }}</a>
				</li>
			@endforeach
		</ul>

		{!! $products->render() !!}
	</div>
  </section>
</div>

@stop