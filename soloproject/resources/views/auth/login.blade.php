@extends('layout')

@section('location')
	Welcome
@endsection

@section('main-content')

<div class="welcome-image">
</div>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="login">
	<header>
		<h2>So glad you're back!</h2>
		<span>You won't regret your dedication</span>
	</header>
	<form action="{{ url('/auth/login') }}" method="POST" role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
			<div class="input">
				<i class="fa fa-envelope-square"></i>
				<input type="text" name="email" class="email" placeholder="Email" value="{{ old('email') }}">
			</div>
			<div class="input">
				<i class="fa fa-user"></i>
				<input type="password" name="password" class="password" placeholder="Password">
			</div>
		</div>
		<button class="button login-button">Login</button><br>
		<a class="forgot-password" href="{{ url('/password/email') }}">Forgot Your Password?</a>
	</form>
</div>
@endsection
