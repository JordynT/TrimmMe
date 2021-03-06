@extends('layout')

@section('location')
	Dashboard
@endsection

@section('main-content')

<div class="graph">
	<table class="highchart" data-graph-container-before="1" data-graph-type="line" style="display:none" data-graph-height="375" >
		<thead>
		    <tr>
		        <th>Days</th>
		        <th>Goal</th>
		        <th>Actual</th>
		    </tr>
		</thead>
		<tbody class="body">

			<?php $j =0; ?>
			@if(count($Cummulitive) > 100)
				@foreach($Cummulitive as $checkin)
					@if($j==9)

						<tr>
						<td>{{number_format($checkin['day'], 2)}}</td>
						<td>{{number_format($checkin['goal_pounds'], 2)}}</td>
						<td>{{$checkin['actual_pounds']}}</td>
						</tr>
					
					<?php $j=0; ?>
					@endif
					<?php $j++; ?>
				@endforeach
			@else
				@foreach($Cummulitive as $checkin)
					<tr>
						<td>{{$checkin['day']}}</td>
						<td>{{$checkin['goal_pounds']}}</td>
						<td>{{$checkin['actual_pounds']}}</td>
					</tr>
				@endforeach
			@endif
		
		</tbody>
	</table>
</div>
<div class="information">
	<div class="info">
		<span class="actual">Actual Plan:</span>
		<p class="plan-info">At your current daily rate, you will reach your goal of losing <strong> @if($plan_adjustment){{$plan_adjustment->end_weight}} @else {{$plan->lose_weight}} @endif pounds</strong> in a total of <strong>25 days</strong>, which is <strong>under</strong> your plan. </p>
	</div>
	@if($plan_adjustment)
		<div class="info">
		<span class="actual">Adjusted Plan:</span>
		<p class="plan-info">You adjusted your plan to lose <strong>{{$plan_adjustment->end_weight}} pounds</strong> in a total of <strong>{{$plan_adjustment->num_days}} days</strong>.</p>
		</div>
	@endif
	<div class="info">
		<span class="original">Original Plan:</span>
		<p class="plan-info">You planned to lose <strong>{{$plan->lose_weight}} pounds</strong> in <strong>{{$plan->num_days}} days</strong>.</p> 
	</div>
</div>
<div class="dials">
	<form action="/insertCheckin" class="check-in">
		<input type="hidden" class="plan-id" name="plan_id" value="{{$plan->plan_id}}">
		<div class="dial">
			<div> 
				<header class="bubble">Input your caloric intake since your last entry</header>
				<input type="text" name="caloric_intake" value="20" class="knob caloric-intake" data-width="320" data-height="320" data-thickness=".35" data-step="10" data-min="20" data-max="1500" data-cursor=true data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header class="bubble other">Input your caloric expenditure since your last entry</header>
				<input type="text" name="caloric_output" value="20" class="knob caloric-output" data-width="320" data-height="320" data-thickness=".35" data-step="10" data-min="20" data-max="1000" data-cursor=true data-fgColor="rgb(34, 255, 238)" data-bgColor="rgb(109, 229, 106)" data-linecap=round>
			</div>
		</div>
		<button class="button">Submit</button>
	</form>
</div>

@endsection
