<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 6/26/2018
 * Time: 11:26 PM
 */

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\CategoryCityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryDistrictController;
use App\Http\Controllers\Admin\CategoryStreetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuth\LoginController as AdminLoginController;

use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin.guest'])->group(function() {
	/*===========Login Route============*/
	Route::get(AdminLoginController::getResourceName(), AdminLoginController::getControllerWithAction('showLoginForm', 'AdminAuth'))
	     ->name(AdminLoginController::getAdminRouteName('show-login'));
	Route::post(AdminLoginController::getResourceName(), AdminLoginController::getControllerWithAction('login', 'AdminAuth'))
	     ->name(AdminLoginController::getAdminRouteName('login'));
	/*===========Login Route============*/

});

Route::middleware(['admin', 'auth:admin'])->group(function() {
	Route::post('logout', AdminLoginController::getControllerWithAction('logout', 'AdminAuth'))
	     ->name(AdminLoginController::getAdminRouteName('logout'));
	Route::post('change-password', AdminController::getControllerWithAction('change_password'))
	     ->name(AdminController::getAdminRouteName('change-password'));
	/*===========Profile============*/
	Route::get('profile', AdminController::getControllerWithAction('show_profile'))
	     ->name(AdminController::getAdminRouteName('show-profile'));
	Route::post('profile/{id}', AdminController::getControllerWithAction('update_profile'))
	     ->name(AdminController::getAdminRouteName('update-profile'));
	/*===========Profile============*/
	/*===========Dashboard Route============*/
	Route::get('/', DashboardController::getControllerWithAction('index'))
	     ->name(DashboardController::getAdminRouteName('dashboard'));
	Route::get(DashboardController::getResourceName(), DashboardController::getControllerWithAction('index'))
	     ->name(DashboardController::getAdminRouteName('dashboard'));
	/*===========Dashboard Route============*/

	Route::get('category/get-category', CategoryController::getControllerWithAction('getOptionCategoryWithType'));

	/*===========Resource===========*/
	Route::resource(SettingController::getResourceName(), SettingController::getClassName());
	Route::resource(CategoryController::getResourceName(), CategoryController::getClassName());
	Route::resource(AreaController::getResourceName(), AreaController::getClassName());
	Route::resource(CategoryCityController::getResourceName(), CategoryCityController::getClassName());
	Route::resource(CategoryDistrictController::getResourceName(), CategoryDistrictController::getClassName());
	Route::resource(CategoryStreetController::getResourceName(), CategoryStreetController::getClassName());
	Route::resource(StoreController::getResourceName(), StoreController::getClassName());
	Route::resource(AdminController::getResourceName(), AdminController::getClassName());
	Route::resource(NewsController::getResourceName(), NewsController::getClassName());
});

