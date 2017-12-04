@extends('layouts.default')
@section('title', $product->name)
@section('content')
<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div style="margin-bottom:15px  ">
      <span style="font-size:40px;">{{ $product->name }}</span>
      @can('update', $product)
      <button type="button" class="btn btn-default"  style="float: right; margin-top: 15px">
      <a href="{{ route('products.edit', $product->id) }}">
          <span class="glyphicon glyphicon-pencil">edit</span>
      </a>
      </button>
      @endcan
      @can('destroy', $product)
      <button type="button" class="btn btn-default"  style="float: right; margin-top: 15px">
      <a href="#" onclick="$('#myModal').modal('show')">
          <span class="glyphicon glyphicon-remove">delete</span>
      </a>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Confirm deletion?</h4>
          </div>
          <div class="modal-footer">
            <form class="form-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-primary">Delete</button>
            </form>
          </div>
        </div>
      </div>
      </div>
      @endcan
    </div>

    <section>
      <div class="col-md-12" style="padding-left:0;">
        @include('products._carousel', ['images' => $images])
      </div>
    </section>

    <section class="product_info">
      <h2><b>Post Info</b></h2>
      <table class="table table-hover">
        <col width="50">
        <col width="250">
        <tr>
          <td ><b>category:</b></td>
          <td >{{ $product->category }}</td>
        </tr>
        <tr>
          <td ><b>description:</b></td>
          <td >{!! $product->description !!}</td>
        </tr>
        <tr>
          <td ><b>contact:</b></td>
          <td >{{ $product->contact }}</td>
        </tr>
        <tr>
          <td ><b>price:</b></td>
          <td >${{ $product->price }}</td>
        </tr>
        <tr>
          <td ><b>date:</b></td>
          <td >{{ $product->created_at->format('M/d') }}</td>
        </tr>
      </table>
    </section>

    <section class="favourite">
      @if (Auth::check())
        @include('users._collect_form', ['product' => $product])
      @endif
    </section>

  </div>
</div>
@stop