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

      <!-- postings -->
      <div class="col-md-offset-2 col-md-8">
        <section class="creat_product">
          <a href="{{ route('products.create') }}">
            <button class="btn btn-normal">Create a product</button>
          </a>
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

    <!-- wishlist -->
    <div class="col-md-12">
      <section class="collection_info">
        @include('users._collections', ['collections' => $collections])
      </section>
    </div>

  </div>
</div>
@stop