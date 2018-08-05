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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

	Route::get('/', function () {
	    return view('home');
	});

	Route::get('/{name}', function () {
	    return redirect('/');
	});

	Route::resource('phonebook' , 'PhonebookController');

	Route::post('/getData','PhonebookController@getData' );	
	Route::post('/getC_user','PhonebookController@getC_user' );	
	Route::post('/logout', function(){
		Auth::logout();

		return redirect('/');
	});	

	Route::get('/home',function(){
		return view('home');	
	});
});