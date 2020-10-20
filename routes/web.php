<?php


namespace App\Http\Controllers\Auth;

use  App\Models\teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use app\Http\Controllers\AuthController;
use app\Http\Controllers\Controller;	
use app\Http\Controllers\LoginController;

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
    return view('admin.home');
});



Route::get('/login', function () {
    return view('login.index');
});

Route::get('/login2' , 'App\Http\Controllers\LoginController@index');
Route::get('/show' , 'LoginController@show');

// route::group(['middleware' => 'guest'], function() {

// })

