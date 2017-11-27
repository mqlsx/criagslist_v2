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
            <textarea name="category" class="form-control" rows="1"></textarea>
          </div>

          <div class="form-group">
            <label for="name">name：</label>
            <textarea name="name" class="form-control" rows="1"></textarea>
          </div>

          <div class="form-group">
            <label for="description">description：</label>
            <textarea name="description" class="form-control" rows="3" ></textarea>
          </div>

          <div class="form-group">
            <label for="contact">contact：</label>
            <textarea name="contact" class="form-control" rows="2" placeholder=""></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        

    </div>
  </div>
</div>
@stop