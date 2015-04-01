<?php namespace App\Http\Controllers;
use DB;
use Request;
use App\Models\Plan;
use Auth;
use App\Models\Checkin;
use DashboardController;
//use App\Http\Controllers\DashboardController;
use App\User;

class CheckinController Extends Controller {


	/************************************************************
	Inserts into check_in table
	*************************************************************/

	public function newCheckin(){
		//Insert statement for check in's//
		$check_in = new Checkin();
		$check_in->plan_id = Request::input('plan_id');	
		$check_in->current_weight = Request::input('current_weight');
		$check_in->caloric_intake = Request::input('caloric_intake');
		$check_in->caloric_output = Request::input('caloric_output');
		$check_in->checkin_date = date("Y-m-d");
		$check_in_id = $check_in->save();

		$check_in_id = new Checkin($check_in_id);
	
		return redirect('dashboard');
	}


}