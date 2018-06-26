<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * @return mixed
	 */
	public static function getClassName() {
		$class = static::class;
		$class = explode('\\', $class);

		return end($class);
	}

	/**
	 * @return string
	 */
	public static function getResourceName() {
		$class    = self::getClassName();
		$resource = str_replace('Controller', '', $class);
		$resource = snake_case($resource, '-');

		return strtolower($resource);
	}

	/**
	 * @param $action
	 * @return string
	 */
	public static function getControllerWithAction($action) {
		return self::getClassName() . "@" . $action;
	}

	/**
	 * @param string $route
	 * @return string
	 */
	public static function getAdminRouteName($route = 'index') {
		return self::getRouteName('', $route);
	}

	/**
	 * @param string $prefix
	 * @param string $route
	 * @return string
	 */
	public static function getRouteName($prefix = '', $route = 'index') {
		$routeName = '';
		if (!empty($prefix)) {
			$routeName = $prefix . '.';
		}

		$routeName .= self::getResourceName();


		if (!empty($route)) {
			$routeName .= '.' . $route;
		}

		return $routeName;
	}

	/**
	 * @param mixed $parameters
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public static function getUrlAdmin($parameters = null) {
		return url('admin/' . self::getResourceName(), $parameters);
	}

	/**
	 * @param string $action
	 * @param null   $parameters
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public static function getConfigUrlAdmin($action = '', $parameters = null) {
		$path = 'admin/' . self::getResourceName();
		if (!empty($action)) {
			$path .= "/$action";
		}

		return url($path, $parameters);
	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public static function getEditUrlAdmin($id) {
		$params = [$id, 'edit'];

		return self::getUrlAdmin($params);
	}
}