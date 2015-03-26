@extends('layout')

@section('location')
New Plan
@endsection

@section('main-content')
<div class="common-image">
	image
</div>
<div class="dials">
	<form action="/insertNewPlan">
		<input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
		<div class="dial">
			<div>
				<header>Input your current weight in lbs.</header>
				<input type="text" value="100"class="knob" data-width="150"
				data-thickness=".3" data-min="100" data-max="350" data-cursor=true name="start_weight">
			</div>
		</div>
		<div class="dial">
			<div> 
				<header>Input lbs. you would like to lose</header>
				<input type="text"  value="1" class="knob" data-width="150"
				data-thickness=".3" data-min="1" data-max="200" data-cursor=true name="lose_weight">
			</div>
		</div>
		<div class="dial">
			<div> 
				<header>Input the amount of days you would like to lose your weight in</header>
				<input type="text"  value="7" class="knob" data-width="150"
				data-thickness=".3" data-step="2" data-min="7" data-max="550" data-cursor=true name="end_date">
			</div>
		</div>
		<div class="dial">
			<button>Enter your data</button>
		</div>
	</form>
</div>
@endsection

