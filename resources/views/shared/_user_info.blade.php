<a href="{{ route('users.show', $user->id) }}">
	<img src="{{ $user->gravatar('140') }}" alt="{{ $user->username }}" class="gravatar"/>
</a>
<h1>{{ $user->username }}</h1>