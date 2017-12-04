@extends('layouts.default')
@section('title', 'Registration')

@section('content')
<div class="col-md-offset-3 col-md-6">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h5 id="signup-head">Create account</h5>
    </div>

    <div class="panel-body">
    	@include('shared._errors')

      <form method="POST" action="{{ route('users.store') }}">
      	{{ csrf_field() }}
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="at least 6 characters">
				</div>

				<div class="form-group">
					<label for="password_confirmation">Re-enter password</label>
					<input type="password" id="repassword" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
				</div>
				<br>

      	<button type="submit" class="btn btn-primary col-md-12">Create free account</button>
      </form>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="/js/validate.js"></script>
@stop