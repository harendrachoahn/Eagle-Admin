<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
   });




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//create for redirect to admin panel using middleware (we have changes in AdminMiddleware,kernel,LoginController files //here auth and admin indicate to folder)
Route::group(['middleware'  => ['auth','admin']], function() {
	// you can use "/admin" instead of "/dashboard"
    Route::get('/dashboard/','Admin\DashboardController@index');
    Route::get('/employee-time/','ClockInOutController@clockInOut');

	//below route for edit the users detail and update.
	Route::get('/add-user/','Admin\DashboardController@addNewUser');
	Route::post('/add-user/','Admin\DashboardController@addUser')->name('add-user');

	Route::get('/role-register','Admin\DashboardController@registered');
	//below route for edit the users detail and update.
	Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
	//update button route
	Route::put('/user-update/{id}','Admin\DashboardController@registerupdate');
	//delete route
	Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

});