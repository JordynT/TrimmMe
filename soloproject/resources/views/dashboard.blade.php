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
		<tbody>

			<?php $j =0; ?>
			@if(count($Cummulitive) > 100)
				@foreach($Cummulitive as $key => $checkin)
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
	<span>Actual Plan:</span>
	<p class="info">You are planned to lose "weight here" in "days here" which is "x days over/under" your plan. </p>
	<span>Original Plan:</span>
	<p class="info">You planned to lose {{$plan->lose_weight}} pounds in {{$plan->num_days}} days.</p> 
</div>
<div class="dials">
	<form action="/insertCheckin">
		<input type="hidden" name="plan_id" value="{{$plan->plan_id}}">

		<div class="dial">
			<div>
				<header>Your current weight in lbs.</header>
				<input type="text" name="current_weight" value="100" class="knob" data-width="150"
				data-thickness=".3" data-min="100" data-max="350" data-cursor=true>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header>Input your caloric intake since your last entry</header>
				<input type="text" name="caloric_intake" value="20" class="knob" data-width="150"
				data-thickness=".3" data-step="10" data-min="20" data-max="1500" data-cursor=true>
			</div>
		</div>
		<div class="dial">
			<div> 
				<header>Input your caloric expenditure since your last entry</header>
				<input type="text" name="caloric_output" value="20" class="knob" data-width="150"
				data-thickness=".3" data-step="10" data-min="20" data-max="1000" data-cursor=true>
			</div>
		</div>
		<button>Submit</button>
	</form>
</div>

@endsection
