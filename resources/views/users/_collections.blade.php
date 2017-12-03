
<div>
	<h1>Wish list</h1>
	<ul class="collections">
		@foreach ($collections as $collection)
			<li>
				<a href="{{ route('products.show', $collection) }}" class="collection_name">{{ $collection->name }}</a>
			</li>
		@endforeach
	</ul>

	{!! $collections->render() !!}
</div>
