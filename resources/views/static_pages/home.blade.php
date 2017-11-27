@extends('layouts.default')

@section('content')
  @if (Auth::check())
     
    {{ redirect()->route('products.index') }}

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