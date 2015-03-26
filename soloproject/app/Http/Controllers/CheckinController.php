<?php namespace App\Http\Controllers;
use DB;
use Request;
use App\Models\Plan;
use Auth;
use App\Models\Checkin;
use App\User;

class CheckinController Extends Controller {

	public function newCheckin(){
		
		//Insert statement for check in's//
		$check_in = new Checkin();
		$check_in->plan_id = Request::input('plan_id');	
		$check_in->current_weight = Request::input('current_weight');
		$check_in->caloric_intake = Request::input('caloric_intake');
		$check_in->caloric_output = Request::input('caloric_output');
		$check_in_id = $check_in->save();
	
		return redirect('dashboard');
	}


	// public function grabCheckin(){
	// 	$user = Auth::user();
	// 	$user_id = $user->user_id;
	// 	$plan = Plan::getPlan($user_id);
	// 	$plan_id = $plan->plan_id;
	// 	$check_in = Checkin::getCheckin($plan_id);

	// 	$checkin_date = $check_in->checkin_date;
	// 	//$check_in_id = $check_in->check_in_id;
	// 	$caloric_intake = $check_in->caloric_intake;
	// 	$caloric_output = $check_in->caloric_output;
	// 	$rmr = $user->rmr;

	// 	$pounds = $this->calorieToPound($caloric_intake, $caloric_output, $rmr);
	// 	$checkinArray = ['pounds' => $pounds, 'checkin_date' => $checkin_date];
	// 	print_r($checkinArray);

	// }

	// public function calorieToPound($caloric_intake, $caloric_output, $rmr){
	// 	$delta = ($caloric_intake - $rmr) - $caloric_output;
	// 	$pounds = $delta/3500;
	// 	return $pounds;
	// }
}