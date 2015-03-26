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
				@for($d=0; $d <= $plan->num_days; $d+=10)
					{{-- <tr>
						<td>{{$d}} days</td>
				        <td>{{number_format($d*$plan->lose_weight/$plan->num_days,2)}}</td>
				        <td>10</td>
			        </tr>
			    --}}
			    @endfor
	    	<tr>
		        <td>1</td>
		        <td>.2</td>
		        <td>0</td>
	     	</tr>
	     	<tr>
		        <td>2</td>
		        <td>.4</td>
		        <td>0</td>
	     	</tr>
	     	<tr>
		        <td>3</td>
		        <td>.6</td>
		        <td>.5</td>
	     	</tr>
	     	<tr>
		        <td>4</td>
		        <td>.8</td>
		        <td>.7</td>
	     	</tr>
	     	<tr>
		        <td>5</td>
		        <td>1.0</td>
		        <td>0.7</td>
	     	</tr>
	     	<tr>
		        <td>6</td>
		        <td>1.2</td>
		        <td>1.2</td>
	     	</tr>
	     	<tr>
		        <td>7</td>
		        <td>1.4</td>
		        <td>1.2</td>
	     	</tr>
	    	
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
				<input type="text" name="current_weight" value="{{$check_in->current_weight}}" class="knob" data-width="150"
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
