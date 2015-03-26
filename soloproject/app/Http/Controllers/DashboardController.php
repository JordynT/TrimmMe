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

		$plan = Plan::getPlan($user_id);
		$plan_id = $plan->plan_id;

		$checkinArray = $this->getCheckin($plan_id);

		$dailyArray=[];
//WORKING ON THIS GUY!!//
		for($i = 1; $i <= $plan->num_days; $i++) {
// Create a new entry for daily
			$dayItem = [
						'day' => $i,
						'goal_pounds' => $plan->start_weight / $plan->num_days,
						'actual' => getActualLbs($i, $plan->start_weight, $checkinArray)
						]
		}
//END OF TEST//
		return view('dashboard', ['plan' => $plan]);
	}





	private function getCheckin($plan_id) {
		$check_ins = Checkin::getCheckin($plan_id);
		//$check_in_id = $check_in->check_in_id;
		$checkinArray=[];

		foreach($check_ins as $check_in){
			$checkin_date = $check_in->checkin_date;
			$caloric_intake = $check_in->caloric_intake;
			$caloric_output = $check_in->caloric_output;
			$pounds = Checkin::calorieToPound($caloric_intake, $caloric_output, $rmr);
			array_push($checkinArray, ['pounds' => $pounds, 'checkin_date' => $checkin_date]);
		}

		dd($checkinArray);
	}

}