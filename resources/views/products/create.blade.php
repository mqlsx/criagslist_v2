@extends('layouts.default')
@section('title', 'Create a new product')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5 id="create-product-head">Create a new post</h5>
    </div>
	
	<div class="panel-body">

        @include('shared._errors')


        <form method="POST" action="{{ route('products.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">name：</label>
              <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
              <label for="category">category：</label>
              <input type="text" name="category" class="form-control">
            </div>

            <div class="form-group">
              <label for="price">price：</label>
              <input type="text" name="price" class="form-control">
            </div>

            <div class="form-group">
              <label for="contact">contact：</label>
              <input type="text" name="contact" class="form-control">
            </div>

            <div class="form-group">
              <label for="description">description：</label>
              <textarea name="description" class="form-control" id="editor" rows="2" placeholder="" required>
              </textarea>
            </div>

            <div class="">
              <button type="submit" class="btn btn-primary col-md-12">Continue</button>
            </div>
        </form>
    </div>
  </div>
</div>
@stop

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
        });
    });
    </script>

@stop