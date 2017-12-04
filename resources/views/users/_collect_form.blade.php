@if ($product->user_id !== Auth::user()->id)
  <div id="collect_form">
    @if (Auth::user()->isCollected($product->id))
      <form action="{{ route('collections.destroy', $product->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-default btn-md">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span> stared
        </button>
      </form>
    @else
      <form action="{{ route('collections.store', $product->id) }}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default btn-md">
          <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> star
        </button>
      </form>
    @endif
  </div>
@endif