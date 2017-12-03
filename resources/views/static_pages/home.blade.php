@extends('layouts.default')

@section('content')

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,400italic,500,300italic,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='css/platz/style.css' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/platz/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" src="js/platz/jquery.localScroll.min.js"></script>
  <script type="text/javascript" src="js/platz/jquery-animate-css-rotate-scale.js"></script>
  <script type="text/javascript" src="js/platz/fastclick.min.js"></script>
  <script type="text/javascript" src="js/platz/jquery.animate-colors-min.js"></script>
  <script type="text/javascript" src="js/platz/jquery.animate-shadow-min.js"></script>
  <script type="text/javascript" src="js/platz/main.js"></script>
  <div id="wrapper-container">
    <div class="container object">
      <div id="main-container-image">
        <section class="work">
          @foreach ($products as $product)
          <figure class="white">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ $product->img }}" alt="" width="400" height="400"/>
                <dl>
                    <dt>{{ $product->name }}</dt>
                    <dt>${{ $product->price }}</dt>
                    <dd>{{ $product->description }}</dd>
                </dl>
            </a>
            <div id="wrapper-part-info">
                <div id="part-info">{{ $product->name }}</div>
            </div>
          </figure>
          @endforeach
        </section>
      </div>
    </div>
  </div>
@stop