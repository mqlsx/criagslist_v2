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

        <form method="POST" action="{{ route('products.store')}}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="category">category：</label>
            <input type="category" name="category" class="form-control" value="{{ old('category') }}">
          </div>

          <div class="form-group">
            <label for="name">name：</label>
            <input type="name" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="description">description：</label>
            <input type="description" name="description" class="form-control" value="{{ old('description') }}">
          </div>

          <div class="form-group">
            <label for="contact">contact：</label>
            <input type="contact" name="contact" class="form-control" value="{{ old('contact') }}">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        

    </div>
  </div>
</div>
@stop