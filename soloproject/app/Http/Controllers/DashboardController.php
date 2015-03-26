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
		
		$check_ins = Checkin::getCheckin($plan_id);
		$checkinArray=[];

		foreach($check_ins as $check_in){
			$checkin_date = $check_in->checkin_date;
			//$check_in_id = $check_in->check_in_id;
			$caloric_intake = $check_in->caloric_intake;
			$caloric_output = $check_in->caloric_output;
			$pounds = $this->calorieToPound($caloric_intake, $caloric_output, $rmr);
			array_push($checkinArray, ['pounds' => $pounds, 'checkin_date' => $checkin_date]);
		}

		dd($checkinArray);

		return view('dashboard', ['plan' => $plan]);
	}

	public function calorieToPound($caloric_intake, $caloric_output, $rmr){
		$delta = $caloric_output - ($caloric_intake - $rmr) ;
		$pounds = $delta/3500;

		return $pounds;
	}

}