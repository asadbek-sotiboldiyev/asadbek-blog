@extends('base')
@section('title', 'Blog')

@section('links')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/blogIndex.css') }}">
@endsection

@section('content')

<section class="section-title">
	<div class="container">
		<div class="section-content">
			<h1>Blog</h1>
		</div>
	</div>
</section>
<section id="" class="flex align-items-center">
	<div class="container">
		<div class="row justify-between align-top">
			<div id="archive" class="col-md-7">

				@php
					$pre_month = null;
					$pre_year = null;
				@endphp
			
				@forelse ($articles as $article)
			
					@if (is_null($pre_year) or $pre_year != date_format($article->created_at, 'Y'))
						<h4 class="sticky">{{ date_format($article->created_at, 'Y') }}</h4>
					@endif
					@if (is_null($pre_month) or $pre_month != date_format($article->created_at, 'F'))
						</ul>
						<h4>{{ date_format($article->created_at, 'F') }}</h4>
						<ul class="list-wrapper">
					@endif
						<li>
							<a class="list-item" href="{{ route('blogShow', $data = ['url' => $article->url]) }}">
								<div class="date">{{ date_format($article->created_at, 'd F, Y')}}</div>
								<div class="title">{{ $article->title }}</div>
							</a>
						</li>

					@php
						$pre_year = date_format($article->created_at, 'Y');
						$pre_month = date_format($article->created_at, 'F');
					@endphp

				@empty
					<h2>Has no any article</h2>
				@endforelse
			</div>
			@include('channel-footer', ['classes' => ' col-md-4 sticky'])
		</div>
	</div>
</section>

@endsection