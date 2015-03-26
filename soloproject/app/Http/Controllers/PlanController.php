<?php namespace App\Http\Controllers;
use DB;
use Request;
use Auth;
use App\Models\Plan;
use App\Models\Checkin;
// use App\Models\User;
use App\User;

class PlanController Extends Controller {


	public function __construct(){
		$this->middleware('auth');
	}


	public function view(){
		return view('newPlan');
	}
	

	public function newPlan() {
		//deletes info. if it exists in plan table
		$user_id = Request::input('user_id');
		Plan::removePlan($user_id);

		//Creates a new model of Plan, and inserts new information
		$plan = new Plan();
		$plan->user_id = $user_id;
		$plan->start_date = Request::input('start_date');
		$plan->num_days= Request::input('end_date');
		$plan->start_weight = Request::input('start_weight');
		$plan->lose_weight = Request::input('lose_weight');

		//Saves the model, telling it that this must be an insert
		$plan_id = $plan->save();

		//deletes info if it exists in check_in table
		Checkin::removeCheckin($plan_id);

		/*Recreating the "start_weight" into the table of Check_in as well, so the
		user can manipulate their weight easier*/
		$checkin = new Checkin();
		$checkin->plan_id = $plan_id;	
		$checkin->current_weight = Request::input('start_weight');
		$checkin->save();
	
		return redirect('dashboard');
		
	}

}	