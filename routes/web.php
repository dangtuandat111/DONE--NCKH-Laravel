<?php


namespace App\Http\Controllers\Auth;

use  App\Models\teacher;
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

Route::post('/home', 'App\Http\Controllers\LoginController@home')->name('home');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');

Route::post('login/dangnhap', 'App\Http\Controllers\LoginController@postLogin')->name('loginAcc');

Route::get('test',function() {
	

	$t = DB::table('giangvien')->get();
	foreach ($t as $row) {
		# code...
		foreach ($row as $key => $value) {
			# code...
			echo $key.":".$value."<br>";
		}

		echo "<hr>";
	}
});


Route::get('/register', 'App\Http\Controllers\LoginController@register');
// Route::group(['middleware' => 'guest'], funtion () {
// 	Route::match(['get' , 'post'],'login', ['as' => 'login','uses' => 'LoginController@index']);

// });


// Route::group(['middleware' => 'auth'] , function () {
// 	Route::get('/','LoginController@home');

// });


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('view-teachers','App\Http\Controllers\teachersController@index');
// Route::resource('view-teachers','App\Http\Controllers\teachersController');