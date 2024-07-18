<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', "Asadbek's blog")</title>
	@yield('links')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/flexgridcombo.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<header class="header--title flex align-items-center">
		<div class="container">
			<div class="align-items-center flex">
				<div class="logo-wrapper">
					<a class="logo" href="/">Asadbek's Blog</a>
				</div>
				<ul class="nav align-items-center">
					@auth
						<li><a class="list-item" href="{{ route('blogCreate') }}">Write</a></li>
					@endauth
					<li><a class="list-item" href="{{ route('blogIndex') }}">Blog</a></li>
					<li><a class="list-item" href="https://t.me/sotiboldiyev_asadbek" target="_blank">Channel</a></li>
				</ul>
				<div class="burger-menu">
					<div class="bar bar--top"></div>
					<div class="bar bar--middle"></div>
					<div class="bar bar--bottom"></div>
				</div>
			</div>
		</div>
	</header>
	
	@yield('content')

    <script src="{{ asset('js/ScrollMonitor.min.js') }}"></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>