@extends('base')
@section('title', 'Delete article')

@section('content')

<div class="container">
	<form method="post" class="jumbotron" action="{{ route('blogDestroy', ['url' => $article->url]) }}">
		@csrf
		<h1><u>{{ $article->title }}</u> ni o'chirmoqchimisiz ?</h1>
		<div class="flex justify-between mt-3">
			<a class="btn btn-primary" href="{{ route('blogIndex') }}">Cancel</a>
			<button class="btn btn-danger ml-2">Delete</button>
		</div>
	</form>
</div>
<style>
	form{
		margin-top: 100px;
	}
</style>
@endsection