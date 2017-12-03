@extends('layouts.default')
@section('title', $user->username)
@section('content')

<div class="col-md-12">
  <section class="collection_info">
    @include('users._collections', ['collections' => $collections])
  </section>
</div>

@stop