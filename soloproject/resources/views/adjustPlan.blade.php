@extends('layout')

@section('location')
	Adjust Plan
@endsection

@section('main-content')
<div class="dials">
	<div class="dial current-plan">

		<span>Adjust your Plan</span>
		{{-- <div class="dial-fixed">
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
		</div> --}}
	</div>
	<form action="/insertAdjustPlan">
		<input type="hidden" name="plan_id" value="{{$plan->plan_id}}">
		<div class="dial">
			<div>
				<header class="bubble">Input your current weight in lbs.</header>
				<input type="text" name="current_weight" value="100"class="knob" data-width="320" data-height="320"data-thickness=".35" data-min="100" data-max="350" data-cursor=true data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header class="bubble">Input lbs. you would like to lose</header>
				<input type="text" name="end_weight" value="1" class="knob" data-width="320" data-height="320" data-thickness=".35" data-min="1" data-max="200" data-cursor=true data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header class="bubble">Input the amount of days you would like to lose your weight in</header>
				<input type="text" name="num_days" value="7" class="knob" data-width="320" data-height="320" data-thickness=".35" data-step="2" data-min="7" data-max="550" data-cursor=true data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<button class="button">Adjust your plan</button>
	</form>
</div>
@endsection