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


use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function() {
//	return view('welcome');
//});

Auth::routes();
Route::namespace('Website')->group(function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/san-pham', HomeController::getControllerWithAction('showProduct'));
	Route::get('/hoi-dap', HomeController::getControllerWithAction('showAnswerQuestion'));
	Route::get('/tin-tuc', HomeController::getControllerWithAction('showNews'));
	Route::get('/he-thong-nha-thuoc', HomeController::getControllerWithAction('showSystemStore'));
	Route::get('/dat-hang', HomeController::getControllerWithAction('showOrder'));
	Route::get('/{slug}-{id}', HomeController::getControllerWithAction('showByPost'));
	Route::get('/danh-muc/{slug}', HomeController::getControllerWithAction('showByCategory'));
});
