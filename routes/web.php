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

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@viewProfile');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], 
function()
{
	Route::get('/viewStaff', 'HomeController@listOfStaff');
	Route::get('/setting', 'HomeController@setting');
});

