@extends('layout')

@section('location')
New Plan
@endsection

@section('main-content')
<div class="dials">
	<div class="dial current-plan">
		<span>Create your Plan</span>
	</div>
	<form action="/insertNewPlan">
		<input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
		<div class="dial">
			<div>
				<header class="bubble">Input your current weight in lbs.</header>
				<input type="text" value="100"class="knob" data-width="320" data-height="320"
				data-thickness=".35" data-min="100" data-max="350" data-cursor=true name="start_weight" data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header class="bubble">Input lbs. you would like to lose</header>
				<input type="text"  value="1" class="knob" data-width="320" data-height="320"
				data-thickness=".35" data-min="1" data-max="200" data-cursor=true name="lose_weight"data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header class="bubble">Input the amount of days you would like to lose your weight in</header>
				<input type="text"  value="7" class="knob" data-width="320" data-height="320"
				data-thickness=".35" data-step="2" data-min="7" data-max="550" data-cursor=true name="end_date" data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<button class="button">Enter your data</button>
		</div>
	</form>
</div>
@endsection

