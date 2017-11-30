@extends('layouts.default')
@section('title', 'image')

@section('content')
<div class='container'>
	<form id='form_image' action="{{ route('products.image') }}" method='POST' enctype="multipart/form-data">
		<label id='label_image'>Select image to upload:</label>
		<input type='file' name='image' id='image'>
		<input type='submit' value="Upload" name='submit' id='submit_image'>
		{{ csrf_field() }}
	</form>
</div>

@stop