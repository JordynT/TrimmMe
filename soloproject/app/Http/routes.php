<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('auth/login');
});


//About Page//

Route::get('/about', function(){
	return view('about');
});


//NEW PLAN//


Route::get('/newPlan', 'PlanController@view');

Route::get('/insertNewPlan', 'PlanController@newPlan');



//DASHBOARD//

Route::get('/dashboard', 'DashboardController@viewDash');


//CHECKIN//

Route::get('/insertCheckin', 'CheckinController@newCheckin');



//Adjust Plan//

Route::get('/adjustPlan', 'PlanController@viewAdjustPlan');
Route::get('/insertAdjustPlan', 'PlanController@insertAdjustPlan');


//Auth//

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
