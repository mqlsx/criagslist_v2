@if ($product->user_id !== Auth::user()->id)
  <div id="collect_form">
    @if (Auth::user()->isCollected($product->id))
      <form action="{{ route('collections.destroy', $product->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm">remove</button>
      </form>
    @else
      <form action="{{ route('collections.store', $product->id) }}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm btn-primary">save</button>
      </form>
    @endif
  </div>
@endif