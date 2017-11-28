
<div>
	<h1>Wish list</h1>
	<ul class="collections">
		@foreach ($collections as $collection)
			<li>
				<!-- <img src="{{ $user->gravatar() }}" alt="{{ $user->username }}" class="gravatar" /> -->
				<a href="{{ route('products.show', $collection) }}" class="collection_name">{{ $collection->name }}</a>
			</li>
		@endforeach
	</ul>

	{!! $collections->render() !!}
</div>
