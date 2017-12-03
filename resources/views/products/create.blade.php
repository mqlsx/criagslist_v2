@extends('layouts.default')
@section('title', 'Create a new product')

@section('content')
<div class="col-md-offset-3 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5 id="create-product-head">Create product</h5>
    </div>
	
	<div class="panel-body">

        @include('shared._errors')


        <form method="POST" action="{{ route('products.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="category">category：</label>
              <textarea name="category" class="form-control" rows="1" placeholder="">{{ old('category') }}</textarea>
            </div>

            <div class="form-group">
              <label for="name">name：</label>
              <textarea name="name" class="form-control" rows="1" placeholder="">{{ old('name') }}</textarea>
            </div>

            <div class="form-group">
              <label for="description">description：</label>
              <textarea name="description" class="form-control" rows="3" placeholder="">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
              <label for="price">price：</label>
              <textarea name="price" class="form-control" rows="1" placeholder="">{{ old('price') }}</textarea>
            </div>

            <div class="form-group">
              <label for="contact">contact：</label>
              <textarea name="contact" class="form-control" rows="2" placeholder="">{{ old('contact') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Continue</button>
        </form>
    </div>
  </div>
</div>
@stop