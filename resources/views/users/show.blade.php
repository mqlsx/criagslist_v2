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
      <div class="col-md-offset-2 col-md-8">
        <section class="creat_product">
          <a href="{{ route('users.edit', $user->id) }}">
            <button class="btn btn-normal">edit profile</button>
          </a>
        </section>
      </div>


      
    </div>
  </div>

  
</div>

@stop