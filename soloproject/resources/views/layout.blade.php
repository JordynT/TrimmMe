<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrimmMe</title>

	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Gruppo|Numans' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="{{ URL::asset('/bower_components/jquery-knob/js/jquery.knob.js') }}"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharttable.org/master/jquery.highchartTable-min.js"></script>
	<script src="{{ URL::asset('/js/src/main.js') }}"></script>
		
</head>
<body>
	<div class="page">
		<aside class="primary-menu">
			@if(Auth::user())
				<div class="nav">
					<i class="fa fa-area-chart"></i>
					<span><a href="/dashboard">Dashboard</a></span>
				</div>
				<div class="nav">
					<i class="fa fa-adjust"></i>
					<span><a href="/adjustPlan">Adjust your Plan</a></span>
				</div>
				<div class="nav">
					<i class="fa fa-question"></i>
					<span><a href="/about">About</a></span>
				</div>
				<div class="nav">
					<i class="fa fa-user-times"></i>
					<span><a href="/auth/logout">Sign-out</a></span>
				</div>
				<div class="calendar">
					<img src="/images/calendar.jpg">
				</div>
			@else 
				<div class="nav">
					<i class="fa fa-area-chart"></i>
					<span><a href="/auth/register">Sign-up</a></span>
				</div>
				<div class="nav">
					<i class="fa fa-question"></i>
					<span><a href="/about">About</a></span>
				</div>
				<div class="calendar">
					
				</div>
			@endif

		</aside>
		<header>
			<div class="menu">
				<a class="show-menu" href="#"><i class="fa fa-bars"></i></a>
			</div>
			<div class="location">
				@section('location')
				@show
			</div>
			<div class="user">
				@if(Auth::user())
				<i class="fa fa-user"></i>
				<span class="user-name">{{Auth::user()->first_name}}</span>
				@else
				<span class="logo"><a class="logo" href="/">TrimmMe</a></span>
				@endif
			</div>
		</header>
		<main>
			@yield('main-content')
		</main>
	</div>
</body>
</html>



	
	
 
