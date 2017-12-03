<label>name:</label>{{ $product->name }}
<br>
<label>category:</label>{{ $product->category }}
<br>
<label>description:</label>{!! $product->description !!}
<br>
<label>contact:</label>{{ $product->contact }}
<br>
<label>price:</label>{{ $product->price }}
<br>
<label>date:</label>{{ $product->created_at->format('M/d') }}
<br>
