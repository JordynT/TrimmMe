@extends('layout')
@section('main-content')
<div class="main">
	<div>
		<aside>
			<header>
				Header
			</header>
			<div class="nav">
				<span>Dashboard</span>
			</div>
			<div class="nav">
				<span>Adjust your Plan</span>
			</div>
			<div class="nav">
			<span>Resources</span>
			</div>
			<div class="nav">
				<span>Sign-out</span>
			</div>
			<div class="calendar">
				calendar
			</div>
		</aside>
		<main>
			<header>
				<div class="page-name">
					Home
				</div>
				<div class="user">
					user-name
				</div>
			</header>
			<div class="graph">
				graph here!
			</div>
			<div class="plan">
				plans here
			</div>
			<div class="input">
				inputs here
			</div>

		</main>
	</div>
</div>		
@endsection
