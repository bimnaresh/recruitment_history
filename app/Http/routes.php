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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
Route::group(['middleware'=>'auth'],function(){
Route::group(['middleware' => 'App\Http\Middleware\BlockMiddleware'], function()
{

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
   Route::resource('member','MemberController');
	Route::resource('history','HistoryController');
	Route::post('history/create','HistoryController@create');
	// Route::resource('notification_and_email','MemberController@get_notification_and_email');
	Route::get('member_block/{id}','MemberController@block');
	Route::resource('back_to_admin','MemberController@back_to_admin');

});

	Route::resource('notification','NotificationController');
	Route::resource('agent','AgentController');
	Route::resource('employer','EmployerController');
	Route::resource('approval_view','AgentController@approval_view');
	Route::resource('demand_view','AgentController@demand_view');
	Route::resource('demand_delete','AgentController@demand_delete');
	Route::resource('demand_view_detail','AgentController@demand_view_detail');
	Route::resource('notification_email_view','AgentController@notification_email_view');
	Route::post('approval/create','ApprovalController@create');
	Route::resource('resume','ResumeController');

	Route::resource('email','AgentController@notification_email_view');
	Route::resource('approval','ApprovalController');	
	Route::resource('demand','DemandController');
	Route::resource('password','PasswordController');
	// Route::resource('search','searchController');
	Route::get('resumep','ResumeController@index');
	Route::get('resump','ApprovalController@index');
	// Route::get('resumeSearch','ApprovalController@create');
	Route::get('adminemail','NotificationController@index');
	Route::get('empdemand','AgentController@demand_view');
	Route::get('dem','DemandController@index');
	Route::get('members','MemberController@index');
});
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

