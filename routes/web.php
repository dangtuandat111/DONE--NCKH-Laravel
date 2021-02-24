<?php


namespace App\Http\Controllers\Auth;

use  App\Models;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use app\Http\Controllers\AuthController;
use app\Http\Controllers\Controller;	
use app\Http\Controllers\LoginController;
use DB;
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


Route::group(['middleware' => 'guest'] , function() {
	Route::match(['get','post'],'login', ['as' => 'login', 'uses' =>'App\Http\Controllers\LoginController@index']);
});



Route::group(['middleware' => 'auth' ], function() {
	Route::group(['prefix' => 'admin'], function() {
		Route::group(['prefix' => 'hocphan'], function() {
			Route::get('thongtin', 'App\Http\Controllers\HocPhanController@getThongTin');
			Route::get('sua/{id_module}', 'App\Http\Controllers\HocPhanController@fixThongTin');
			Route::get('them', 'App\Http\Controllers\HocPhanController@addThongTin');
			Route::get('xoa/{id_module}', 'App\Http\Controllers\HocPhanController@deleteThongTin');

			Route::post('them', 'App\Http\Controllers\HocPhanController@postAdd');
			Route::post('sua/{id_module}', 'App\Http\Controllers\HocPhanController@postFix');
		});


		Route::group(['prefix' => 'teacher'], function() {
			Route::get('thongtin','App\Http\Controllers\GiangVienController@getThongTin');
			Route::get('sua/{ID_Teacher}', 'App\Http\Controllers\GiangVienController@fixThongTin');
			Route::get('them', 'App\Http\Controllers\GiangVienController@addThongTin');
			Route::get('xoa/{ID_Teacher}', 'App\Http\Controllers\GiangVienController@deleteThongTin');

			Route::post('them', 'App\Http\Controllers\GiangVienController@postAdd');
			Route::post('sua/{ID_Teacher}', 'App\Http\Controllers\GiangVienController@postFix');
		});

		Route::group(['prefix' => 'import'], function(){
			Route::get('hocphan', 'App\Http\Controllers\importController@getModules');
			Route::post('hocphan',  'App\Http\Controllers\importController@postModules');
		});

	});
	
	Route::get('/home', 'App\Http\Controllers\LoginController@home');
	Route::get('/logout', 'App\Http\Controllers\LoginController@Logout');

});








