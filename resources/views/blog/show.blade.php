@extends('base')
@section('title', $article->title)
@section('content')
<section class="flex align-items-center">
	<div class="container">
		<div class="row article-wrapper justify-center align-top">
			<div class="article-header col-md-8">
				<h1 class="title">{{ $article->title }}</h1>
				<div class="date">
					<span>{{ date_format($article->created_at, 'd F, Y - H:i')}}</span>
				</div>

				@auth()
					<div class="flex justify-around">
						<a class="btn btn-primary my-2" href="{{ route('blogEdit', ['url' => $article->url]) }}">Edit</a>
						<a class="btn btn-outline-danger my-2" href="{{ route('blogDelete', ['url' => $article->url]) }}">Delete</a>
					</div>
				@endauth

			</div>
		<article class="content col-md-8 col-12">{!! $article->content !!}</article>
		<div class="div col-lg-7 col-md-8 col-12">
			@include('channel-footer', ['classes' => ''])
		</div>
		<ul class="custom-pagination col-md-8 col-12">
			<div class="pagination-list row">
				@if (!empty($previous))
				<li class="col prev">
					<a href="{{ route('blogShow', ['url' => $previous->url]) }}" title="Raqamli Gigiena">
						← Previous
					</a>
				</li>
				@endif
				<li class="col"><a href="{{ route('blogIndex') }}">See More</a></li>
				@if (!empty($next))
				<li class="col next">
					<a href="{{ route('blogShow', ['url' => $next->url]) }}" title="Million Dollarlik Imkoniyat">
						Next →
					</a>
				</li>
				@endif
			</div>
		</ul>
	</div>
</div>
</section>
@endsection