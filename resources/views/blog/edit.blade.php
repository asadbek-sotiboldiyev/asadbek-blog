@extends('base')
@section('title', 'Write new article')

@section('links')
	<script src="{{ asset('js/trix.umd.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/blogCreate.css') }}">
@endsection

@section('content')

<div class="container">
	<form name="form" method="post" action="{{ route('blogUpdate', ['url' => $article->url]) }}" enctype="multipart/form-data">
		@csrf
		<div class="publish-btn-div">
			<a href="{{ route('blogShow', ['url' => $article->url]) }}" class="publish-btn mr-3" id="publish-btn">Cancel</a>
			<button class="publish-btn" id="publish-btn">Publish</button>
		</div>
		<br>
		<div class="poster-upload-btn-div">
			<input type="file" name="poster" id="posterUpload">
		</div>
		<input class="title-input" type="text" name="title" placeholder="mavzu" value="{{ $article->title }}">

		<input id="x" type="hidden" name="content" value="{{ $article->content }}" required/>
		<trix-editor input="x" class="trix-content"></trix-editor>
	</form>
</div>

@endsection