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
Route::get('admin', function() {
	return redirect(url_admin('login'));
});

Route::namespace('Website')->group(function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home')->name('home');
	Route::get('/san-pham', HomeController::getControllerWithAction('showProduct'))->name('san-pham');
	Route::get('/hoi-dap', HomeController::getControllerWithAction('showAnswerQuestion'))->name('hoi-dap');
	Route::get('/tin-tuc', HomeController::getControllerWithAction('showNews'))->name('tin-tuc');
	Route::get('/chia-se', HomeController::getControllerWithAction('showShare'))->name('chia-se');
	Route::get('/chuyen-gia', HomeController::getControllerWithAction('showExpert'))->name('chuyen-gia');
	Route::get('/he-thong-nha-thuoc', HomeController::getControllerWithAction('showSystemStore'))->name('he-thong-nha-thuoc');
	Route::get('/dat-hang', HomeController::getControllerWithAction('showOrder'))->name('dat-hang');
	Route::post('/dat-hang', HomeController::getControllerWithAction('postOrder'))->name('dat-hang');
	Route::post('/dat-hang-ajax', HomeController::getControllerWithAction('postOrderAjax'))->name('dat-hang-ajax');
	Route::get('/dat-hang-thanh-cong', HomeController::getControllerWithAction('showOrderMessage'))->name('dat-hang-thanh-cong');
	Route::post('/dang-ky', HomeController::getControllerWithAction('postSubscribe'))->name('dang-ky');
	Route::post('/lien-he', HomeController::getControllerWithAction('postContact'))->name('lien-he');
	Route::get('/{slug}', HomeController::getControllerWithAction('showBySlug'));
	Route::get('/danh-muc/{slug}', HomeController::getControllerWithAction('showByCategory'));
});

