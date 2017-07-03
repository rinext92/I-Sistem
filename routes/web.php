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
Route::get('/editProfile/{id}', 'HomeController@editProfile');
Route::post('/profileUpdate', 'HomeController@updateProfile');


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], 
function()
{	
	//Staff
	Route::get('/viewStaff', 'HomeController@listOfStaff');
	Route::get('/setting', 'HomeController@setting');
	Route::get('levelAccess/{id}', 'HomeController@levelAccess');
	Route::post('roleChange/{id}', 'HomeController@changeRole');

	///inventory
	Route::get('i-entry', 'InventoryController@create');
	Route::post('add-new-item','InventoryController@store');
	Route::get('i-view', 'InventoryController@index');

	//inventory->category
	Route::post('add-new-category','InventoryController@addCategory');
	Route::get('i-newCategory', 'InventoryController@categoryPage');
	Route::get('i-deleteCategory', 'InventoryController@deleteCategory');
	Route::get('i-updateCategory', 'InventoryController@editCategoryPage');
	Route::get('findItem', 'InventoryController@find');
	Route::get('findCategory', 'InventoryController@checkCategory');
	Route::resource('delCategory', 'InventoryController');
	Route::put('editCategory/{id}', 'InventoryController@updateCategory');
	Route::put('UnCategorizedCategory/{id}', 'InventoryController@ChangeStatsCategory');
	Route::put('ChangeCategoryStats/{id}', 'InventoryController@updateStatus');
	Route::get('ViewCategory', 'InventoryController@viewCategory');
	Route::resource('itemUpdate', 'InventoryController');
});


Route::get('e-asset', function() {
	return view('e-asset.e-asset');
});

Route::get('e-inventory', function() {
	return view('e-inventory.e-inventory');
});

Route::get('search', function() {
	return view('test');
});
