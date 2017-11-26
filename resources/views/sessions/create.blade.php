@extends('layouts.default')
@section('title', 'login')

@section('content')
<div class="col-md-offset-2 col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>Login</h5>
		</div>
		<div class="panel-body">
			@include('shared._errors')

			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="username">username: </label>
					<input type="text" name="username" class="form-control" value="{{ old('username') }}">
				</div>

				<div class="form-group">
					<label for="password">password: </label>
					<input type="password" name="password" class="form-control" value="{{ old('password') }}">
				</div>

				<div class="checkbox">
					<label><input type="checkbox" name="remember">Remember me</label>
				</div>

				<button type="submit" class="btn btn-primary">login</button>
			</form>

			<hr>

			<p><a href="{{ route('signup') }}">Signup</a></p>
		</div>
	</div>
</div>
@stop