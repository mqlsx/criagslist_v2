@extends('layouts.default')
@section('title', 'edit')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h5>Upload Images!!!!</h5>
    </div>

    <div class="panel-body">
      @include('shared._errors')



    <div class="row">
      <div class="col-md-8">
        <form method="POST" action="{{ route('products.uploadImage', $product->id) }}" enctype="multipart/form-data" class="form-inline">
          {{ csrf_field() }}

          <div class="form-group">
              
              <input type='file' name='image' id='image' style="margin-bottom: 0;">
          </div>

          <button type="submit" class="btn btn-normal">Upload</button>
        </form>
      </div>
      <div class="col-md-4">
        <a href="{{ route('products.show', $product) }}">
          <button class="btn btn-normal">Done with images</button>
        </a>
      </div>
    </div>


      <div class="col-md-12" style="padding-left:0;">
      @if (!empty($images))
        
        <ol style="padding-left:0;">
          @foreach ($images as $image)
            <div>
              <img src= "{{ $image->url }}" width="150px" height="150px" style="padding-bottom:10;">
              @can('destroy', $image)
              <form action="{{ route('images.destroy', $image) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Remove</button>
              </form>
              @endcan
              <br>
            </div>
          @endforeach
        </ol>
      @endif
      </div>







    </div>
  </div>
</div>
@stop


