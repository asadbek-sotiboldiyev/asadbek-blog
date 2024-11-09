@extends('base')
@section('title', 'Write new article')

@section('links')
	<script src="{{ asset('js/trix.umd.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/blogCreate.css') }}">
@endsection

@section('content')

<div class="container">
	<form name="form" method="post" action="{{ route('blogStore') }}" enctype="multipart/form-data">
		@csrf
		<div class="publish-btn-div">
			<button class="publish-btn" id="publish-btn">Publish</button>
		</div>
		<br>
		<input class="form-control my-2" type="text" name="title" placeholder="mavzu">

		<input id="x" type="hidden" name="content" value="" required/>
		<trix-editor input="x" class="trix-content"></trix-editor>
	</form>
</div>

@endsection