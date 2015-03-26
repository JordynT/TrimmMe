@extends('layout')

@section('location')
	Welcome
@endsection

@section('main-content')

<div class="welcome-image">
	welcome here pic
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
		<button>Login</button><br>
		<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
	</form>
</div>

{{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
	<div class="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail Address</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Password</label>
			<div class="col-md-6">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Remember Me
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">Login</button>

				<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
			</div>
		</div>
	</div>
</form> --}}

@endsection
