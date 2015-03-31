<?php namespace App\Http\Controllers;
use DB;
use Request;
use App\Models\Plan;
use Auth;
use App\Models\Checkin;
use App\User;
use Carbon\Carbon;

class DashboardController Extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}


	public function viewDash(){
		$user = Auth::user();
		$user_id = $user->user_id;
		$rmr = $user->rmr;

		$plan = new Plan($user_id);
		$plan_id = $plan->plan_id;
		$start_date = $plan->start_date;

		$num_days = $plan->num_days;
		$c_start_date= new Carbon($start_date);
		//dd($c_start_date);
		$plan_adjustment = $plan->getAdjustment();

		if($plan_adjustment) {
			$adjust_date = new Carbon($plan_adjustment->adjustment_date);
			//dd($adjust_date);
			$num_days = $plan_adjustment->num_days;
			//$adjusted_pounds_day = 
			//dd($num_days);	 
		} 

		$checkin_array = $this->getCheckin($plan_id, $rmr);

		$daily_array=[];
		$Cummulitive = [];

		$cumGoalPounds = 0;
		$cumActualPounds = 0;
		$day='';
		$adjust_day = $this->convertDateToDay($adjust_date, $c_start_date);
		//dd($adjust_day);
		

		for($day = 1; $day <= $num_days; $day++) {
			//dd($n1m_days);
			
			$this_date = $this->convertDayToDate($day, $start_date);

			if($plan_adjustment) {
 				 
				if($day <= $adjust_day) {
					$goal_pounds = $plan->lose_weight / $plan->num_days;
				//dd($goal_pounds);

				} else {

					$dr = $plan_adjustment->num_days - $adjust_day;
					$pi = $adjust_day * ($plan->lose_weight/ $plan->num_days);
			 		$pr = $plan_adjustment->end_weight - $pi;
					$goal_pounds = $pr/$dr;
					

				}

			} else {
				$goal_pounds = $plan->lose_weight / $plan->num_days;
			}

			// if($plan_adjustment) {
			// 	$di = $adjust_date->diffInDays($c_start_date);
			// 	$dr = $plan_adjustment->num_days - $di;
			// 	$pi = $di * $goal_pounds;
			// 	$pr = $plan_adjustment->end_weight - $pi;
			// 	$flux = $pr/ $dr;
			// 	$goal_pounds  $flux;
				//dd($goal_pounds);

				//dd($pr);
				//if($di->invert == 0) {
					//echo 'update graph for adjustment';
					//$goal_pounds += $plan_adjustment->end_weight/ $plan_adjustment->num_days;
				//}
			// }
			

			// Create a new entry for daily
			$day_item = [
						'day' => $day,
						'goal_pounds' => $goal_pounds,
						'actual_pounds' => $this->getActualPounds($this_date, $checkin_array)
						];

			$cumGoalPounds = $cumGoalPounds + $goal_pounds;
			//dd($cumGoalPounds);
			$cumActualPounds = $cumActualPounds + $this->getActualPounds($this_date, $checkin_array);

			$Cummulitive_day = [
						'day' => $day,
						'goal_pounds' => $cumGoalPounds,
						'actual_pounds' => $cumActualPounds
			];
			//dd($Cummulitive_day);
			array_push($daily_array, $day_item);
			array_push($Cummulitive, $Cummulitive_day);

		}
		//dd($daily_array);

		return view('dashboard', ['Cummulitive' => $Cummulitive, 'plan' => $plan]);
	}


	private function getCheckin($plan_id, $rmr) {
		$check_ins = Checkin::getCheckin($plan_id);
		
		$checkin_array=[];

		foreach($check_ins as $check_in){
			$checkin_date = $check_in->checkin_date;
			$caloric_intake = $check_in->caloric_intake;
			$caloric_output = $check_in->caloric_output;
			$pounds = Checkin::calorieToPound($caloric_intake, $caloric_output, $rmr);
			array_push($checkin_array, ['pounds' => $pounds, 'checkin_date' => $checkin_date]);
		}

		 return $checkin_array;
	}


	private function getActualPounds($search_date, $checkin_array) {
		//$search_date = $this->convertDayToDate($day, $start_date);
		$actual_pounds = 0;

		foreach($checkin_array as $item) {

			if($item['checkin_date'] == $search_date) {
				$actual_pounds .= $item['pounds'];
			}
		}

		return $actual_pounds;

		}


	private function convertDayToDate($day, $start_date) {
   
		$date = date('Y-m-d',strtotime($start_date) + (24*3600*$day));

		return $date; 

	}

	private function convertDateToDay($adjust_date, $c_start_date){
		$adjust_day = $adjust_date->diffInDays($c_start_date);

		return $adjust_day;
	}


}