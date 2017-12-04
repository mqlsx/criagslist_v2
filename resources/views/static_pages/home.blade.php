@extends('layouts.default')
@section('title', 'PHD Craigslist')
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
      <div>
          <form  class="form-inline" action="{{ route('home') }}" method='POST'>
            {{ csrf_field() }}
            <input style="width:600px" class="form-control" type='text' name='name' value="{{ old('name') }}"  placeholder='name'>
            <select class="form-control" name="category" >
              <option value="all">All</option>
              <option value="car">Car</option>
              <option value="book">Book</option>
              <option value="clothes">Clothes</option>
            </select>
            <input style="width:120px"  class="form-control" type='number' name='min-price'  value="{{ old('min-price') }}" placeholder='min price' step="0.01" min="0">
            <input style="width:120px"  class="form-control" type='number' name='max-price'  value="{{ old('max-price') }}" placeholder='max price' step="0.01" min="0">
            <button style="margin-bottom:15px" class="btn btn-default" type='submit'>update search</button>
          </form>
      </div>
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
  </div>
@stop