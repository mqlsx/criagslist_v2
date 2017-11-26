<li>
  <img src="{{ $user->gravatar() }}" alt="{{ $user->username }}" class="gravatar"/>
  <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->username }}</a>

  @can('destroy', $user)
  	<form action="{{ route('users.destroy', $user->id) }}" method="post">
  		{{ csrf_field() }}
  		{{ method_field('DELETE') }}
  		<button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
  	</form>
  @endcan
</li>