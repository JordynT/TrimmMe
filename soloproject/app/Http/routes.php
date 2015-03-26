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

// Route::get('home', 'HomeController@index');



/********************
	TEST
*********************/

Route::get('/test', 'CheckinController@grabCheckin');



//NEW PLAN//


Route::get('/newPlan', function(){
	return view('newPlan');
});

Route::get('/insertNewPlan', 'PlanController@newPlan');

Route::get('/adjustPlan', function(){
	return view('adjustPlan');
});

//DASHBOARD//

Route::get('/dashboard', 'DashboardController@viewDash');

//CHECKIN//

Route::get('/insertCheckin', 'CheckinController@newCheckin');


// Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
