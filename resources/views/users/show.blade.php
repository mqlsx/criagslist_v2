@extends('layouts.default')
@section('title', $user->username)
@section('content')

  <div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>Your Profile</h5>
    </div>
      <div class="panel-body">

        @include('shared._errors')

        <form method="" action="">

            <div class="form-group">
              <label for="username">username：</label>
              <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
            </div>

            <div class="form-group">
              <label for="email">email：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>
        </form>
    
        <!-- edit profile -->
            @can('update', $user)
            <a href="{{ route('users.edit', $user->id) }}">
              <button class="btn btn-primary">Edit Profile and Password</button>
            </a>
            @endcan



            @if ($user->id != '1')
            @can('destroy', $user)
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
            </form>
            @endcan
            @endif
      


      


      
    </div>
  </div>
</div>



@stop