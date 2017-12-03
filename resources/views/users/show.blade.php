@extends('layouts.default')
@section('title', $user->username)
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="col-md-12">
      <!-- user info -->
      <div class="col-md-offset-2 col-md-8">
        <section class="user_info">
          @include('shared._user_info', ['user' => $user])
        </section>
      </div>

      

      <!-- edit profile -->
      @if ($user->id == '1')
      <div class="col-md-offset-2 col-md-8">
        <section class="creat_product">
          <a href="{{ route('users.edit', $user->id) }}">
            <button class="btn btn-normal">edit profile</button>
          </a>
        </section>
      </div>
      @endif


      @if ($user->id == '1')
      @can('index', Auth::user())
      <a href="{{ route('users.index') }}">
        <button class="btn btn-sm btn-normal">All Users</button>
      </a>
      @endcan
      @endif

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