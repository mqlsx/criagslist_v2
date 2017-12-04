@extends('layouts.default')
@section('title', 'edit')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h5>Update product</h5>
    </div>

    <div class="panel-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('products.update', $product->id )}}" accept-charset="UTF-8">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="name">name：</label>
          <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
          <label for="category">category：</label>
          <input type="text" name="category" class="form-control" value="{{ $product->category }}">
        </div>

        <div class="form-group">
          <label for="contact">contact：</label>
          <input type="text" name="contact" class="form-control" value="{{ $product->contact }}">
        </div>

        <div class="form-group">
          <label for="description">description：</label>
          <textarea name="description" class="form-control" id="editor" rows="2" placeholder="" required>
            {{ $product->description }}
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
<div>
  <script src="{{ asset('js/module.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/hotkeys.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/uploader.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/simditor.js') }}" charset="utf-8"></script>

  <script>
  $(document).ready(function(){
    
      var editor = new Simditor({
          textarea: $('#editor'),
          upload: {
              url: '',
              params: { _token: '{{ csrf_token() }}' },
              fileKey: 'upload_file',
              connectionCount: 10,
              leaveConfirm: 'uploading image...'
          },
          pasteImage: false,
      });
  });
  </script>
</div>
@stop