<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/subscribe','HomeController@subscribe')->name('subscribe');
Route::group(['middleware'=>['revalidate_back_history']],function(){
	Route::get('/','HomeController@home')->name('home');

	Route::group(['prefix'=>'auth','middleware'=>['custom_guest']],function(){

		Route::get('/registration','AuthController@getRegister')->name('getRegister');
		Route::post('/registration','AuthController@postRegister')->name('postRegister');

		Route::post('/ajax-register','AuthController@ajaxRegister')->name('ajaxRegister');
		

		Route::post('/check_email_unique','AuthController@check_email_unique')->name('check_email_unique');

		Route::get('/verify-email/{verification_code}','AuthController@verify_email')->name('verify_email');

		Route::get('/login','AuthController@getLogin')->name('getLogin');
		Route::post('/login','AuthController@postLogin')->name('postLogin');

		Route::post('/ajax-login','AuthController@ajaxLogin')->name('ajaxLogin');
		
		Route::get('/forget-password','AuthController@getForgetPassword')->name('getForgetPassword');

		Route::post('/forget-password','AuthController@postForgetPassword')->name('postForgetPassword');

		Route::get('/reset-password/{reset_code}','AuthController@getResetPassword')->name('getResetPassword');
		
		Route::post('/reset-password/{reset_code}','AuthController@postResetPassword')->name('postResetPassword');

	});


	Route::get('/auth/logout','AuthController@logout')->name('logout')->middleware('custom_auth');

	Route::group(['prefix'=>'profile','middleware'=>['custom_auth']],function(){
		Route::get('/dashboard','ProfileController@dashboard')->name('dashboard');

		Route::get('/edit-profile','ProfileController@edit_profile')->name('edit_profile');
		Route::put('/edit-profile','ProfileController@update_profile')->name('update_profile');

		Route::get('/change-password','ProfileController@change_password')->name('change_password');
		Route::post('/update-password','ProfileController@update_password')->name('update_password');	
	});
});






































































