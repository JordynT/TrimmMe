@extends('layout')

@section('location')
	Adjust Plan
@endsection

@section('main-content')
<div class="dials">
	<div class="dial current-plan">
		<div class="dial-fixed">
			<h1>150</h1>
			<span>lbs. in weight</span>
		</div>
		<div class="dial-fixed">
			<h1>20</h1>
			<span>lbs. lost</span>
		</div>
		<div class="dial-fixed">
			<h1>72</h1>
			<span>days left</span>
		</div>
	</div>
	<div class="dial">
		<div>
			<header>Input your current weight in lbs.</header>
			<input type="text" value="100"class="knob" data-width="150"
			data-thickness=".3" data-min="100" data-max="350" data-cursor=true>
		</div>
	</div>
	<div class="dial">
		<div> 
			<header>Input lbs. you would like to lose</header>
			<input type="text"  value="1" class="knob" data-width="150"
			data-thickness=".3" data-min="1" data-max="200" data-cursor=true>
		</div>
	</div>
	<div class="dial">
		<div> 
			<header>Input the amount of days you would like to lose your weight in</header>
			<input type="text"  value="7" class="knob" data-width="150"
			data-thickness=".3" data-step="2" data-min="7" data-max="550" data-cursor=true>
		</div>
	</div>
</div>
@endsection