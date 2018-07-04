<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 6/28/2018
 * Time: 11:27 AM
 */

namespace App\Commons\providers;


use App\Commons\CFile;
use App\Commons\CUser;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register any application services.
	 * @return void
	 */
	public function register() {
		$this->app->singleton('c-user', function() {
			return new CUser;
		});

		$this->app->singleton('c-file', function() {
			return new CFile;
		});
	}
}