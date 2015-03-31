<?php namespace App\Http\Controllers;
use DB;
use Request;
use App\Models\Plan;
use Auth;
use App\Models\Checkin;
use App\User;

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

		$plan_adjustment = $plan->getAdjustment();

		$checkin_array = $this->getCheckin($plan_id, $rmr);

		$daily_array=[];
		$Cummulitive = [];
		$cumGoalPounds = 0;
		$cumActualPounds = 0;
		$day='';

		for($day = 1; $day <= $plan->num_days; $day++) {
			
			$this_date = $this->convertDayToDate($day, $start_date);
			$goal_pounds = $plan->lose_weight / $plan->num_days;

			if($plan_adjustment) {
				$di = date_diff(date_create($plan_adjustment->adjustment_date), date_create($this_date));
				
				if($di->invert == 0) {
					//echo 'update graph for adjustment';
					$goal_pounds += $plan_adjustment->end_weight/ $plan_adjustment->num_days;
				}
			}
			

			// Create a new entry for daily
			$day_item = [
						'day' => $day,
						'goal_pounds' => $goal_pounds,
						'actual_pounds' => $this->getActualPounds($this_date, $checkin_array)
						];

			$cumGoalPounds = $cumGoalPounds + $goal_pounds;
			$cumActualPounds = $cumActualPounds + $this->getActualPounds($this_date, $checkin_array);

			$Cummulitive_day = [
						'day' => $day,
						'goal_pounds' => $cumGoalPounds,
						'actual_pounds' => $cumActualPounds
			];
			array_push($daily_array, $day_item);
			array_push($Cummulitive, $Cummulitive_day);
		}

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


}