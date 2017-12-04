@extends('layouts.default')
@section('title', 'wishlist')

@section('content')

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,400italic,500,300italic,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='/css/platz/style.css' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/platz/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" src="/js/platz/jquery.localScroll.min.js"></script>
  <script type="text/javascript" src="/js/platz/jquery-animate-css-rotate-scale.js"></script>
  <script type="text/javascript" src="/js/platz/fastclick.min.js"></script>
  <script type="text/javascript" src="/js/platz/jquery.animate-colors-min.js"></script>
  <script type="text/javascript" src="/js/platz/jquery.animate-shadow-min.js"></script>
  <script type="text/javascript" src="/js/platz/main.js"></script>
  <h1 style="font-size:2em;">Wishlist</h1>
  <div id="wrapper-container" style="display: inline-block;">
    <div class="container object">
      <div id="main-container-image">
        <section class="work">
          @foreach ($products as $product)
          <figure class="white">
            
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ $product->img }}" alt="" style="width:200px;height:200px;margin-left:30px"/>
                <dl>
                    <dt>{{ $product->name }}</dt>
                    <dt>${{ $product->price }}</dt>
                    <dd>{!! $product->description !!}</dd>
                </dl>
            </a>
            <div id="wrapper-part-info">
                <div id="part-info" style="
    text-align: center;">{{ $product->name }}</div>
            </div>
          </figure>
          @endforeach
        </section>
      </div>
    </div>
    <div style="width: 100%;text-align: center;">
      {!! $products->render() !!}
    </div>
  </div>
@stop