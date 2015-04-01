@extends('layout')

@section('location')
	Sign Up
@endsection

@section('main-content')

<div class="common-image">
	
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
		<h2>Let's Get Started!</h2>
		<span>This will be an amazing experience</span>
	</header>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form">
			<div class="input">
				<i class="fa fa-user"></i>
				<input type="text" name="first_name"class="first-name" placeholder="First Name" value="{{ old('first_name') }}">
			</div>
			<div class="input">
				<i class="fa fa-user"></i>
				<input type="text" name="last_name" class="last-name" placeholder="Last Name" value="{{ old('last_name') }}">
			</div>
			<div class="input">
				<i class="fa fa-user"></i>
				<input type="text" name="user_name" class="user-name" placeholder="User Name" value="{{ old('user_name') }}">
			</div>
			<div class="input">
				<i class="fa fa-envelope-square"></i>
				<input type="text" name="email" class="email" placeholder="Email" value="{{ old('email') }}">
			</div>
			<div class="input">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" class="password" placeholder="Password">
			</div>
			<div class="input">
				<i class="fa fa-lock"></i>
				<input type="password" class="password" placeholder="Re-enter password" name="password_confirmation">
			</div>
			<div class="input">
				<i class="fa fa-heartbeat"></i>
				<input type="text" name="rmr" class="rmr" placeholder="Resting Metabolic Rate" value="{{ old('zip_code') }}">
			</div>
		</div>
		<button>Sign up!</button>
	</form>

</div>





{{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label class="col-md-4 control-label">Name</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="name" value="{{ old('name') }}">
		</div>
	</div>

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
		<label class="col-md-4 control-label">Confirm Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" name="password_confirmation">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Register
			</button>
		</div>
	</div>
</form> --}}

@endsection
