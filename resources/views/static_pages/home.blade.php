@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">

        <h3>Weibo list</h3>
        
      </div>
      
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
        
      </aside>
    </div>
  @else
    <div class="jumbotron">
      <h1>Craigslist</h1>
      <p class="lead">
        PHD offers always THE BEST!
      <p>
      <br>
      

        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Sign up now</a>
      </p>
    </div>
  @endif
@stop