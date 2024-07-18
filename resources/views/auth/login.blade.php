@extends('base')
@section('title', 'Login')
@section('content')
<div class="container">
	<form method="post" class="jumbotron" action="{{ route('login') }}">
		@csrf
		<center>
			<h2>Login for admin</h2>
		</center>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" id="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		</div>
		<button type="submit" class="btn btn-primary px-5">Login</button>
	</form>
</div>
<style>
	header{
		box-shadow: 0 0 5px grey;
	}
	form{
		margin-top: 100px;
	}
</style>
@endsection