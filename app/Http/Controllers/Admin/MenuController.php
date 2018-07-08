<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 6/29/2018
 * Time: 4:23 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
	public static function render() {
		View::share('menus', (new MenuController)->menu());
	}

	/**
	 * @return array
	 */
	public function menu() {
		return [
			/*Dashboard*/
			[
				'name'     => __("Home"),
				'url'      => url_admin('/'),
				'visible'  => true,
				'icon'     => 'fa-home',
				'children' => []
			],
			/*Dashboard*/
			/*Profile*/
			[
				'name'     => __("Profile"),
				'url'      => url_admin('profile'),
				'visible'  => true,
				'icon'     => 'fa-user-circle-o',
				'children' => []
			],
			/*Profile*/
			/*News*/
			[
				'name'     => __("News"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __("List News"),
						'url'     => url_admin('news'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __("Add News"),
						'url'     => url_admin('news/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*News*/
			/*Post*/
			[
				'name'     => __("Post"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __("List Post"),
						'url'     => url_admin('post'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __("Add Post"),
						'url'     => url_admin('post/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Post*/
			/*Category*/
			[
				'name'     => __("Category"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __("List Category"),
						'url'     => url_admin('category'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __("Add Category"),
						'url'     => url_admin('category/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Category*/
			/*System Store*/
			[
				'name'     => __("System Store"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-globe',
				'children' => [
					/*Store*/
					[
						'name'     => __("Store"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-cube',
						'children' => [
							[
								'name'    => __("List Store"),
								'url'     => url_admin('store'),
								'visible' => true,
								'icon'    => 'fa-cube',
							],
							[
								'name'    => __("Add Area"),
								'url'     => url_admin('store/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*Store*/
					/*Area*/
					[
						'name'     => __("Area"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("List Area"),
								'url'     => url_admin('area'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("Add Area"),
								'url'     => url_admin('area/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*Area*/
					/*City*/
					[
						'name'     => __("City"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("List City"),
								'url'     => url_admin('category-city'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("Add City"),
								'url'     => url_admin('category-city/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*City*/
					/*District*/
					[
						'name'     => __("District"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("List District"),
								'url'     => url_admin('category-district'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("Add District"),
								'url'     => url_admin('category-district/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*District*/
					/*Street*/
					[
						'name'     => __("Street"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("List Street"),
								'url'     => url_admin('category-street'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("Add District"),
								'url'     => url_admin('category-street/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*Street*/
				]
			],
			/*System Store*/
			/*Q & A*/
			[
				'name'     => __("Q & A"),
				'url'     => url_admin('answer'),
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => []
			],
			/*Q & A*/
			/*Advice*/
			[
				'name'     => __("Advices"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-user-circle',
				'children' => [
					[
						'name'    => __("List Advice"),
						'url'     => url_admin('advice'),
						'visible' => true,
						'icon'    => 'fa-user-circle',
					],
					[
						'name'    => __("Add Advice"),
						'url'     => url_admin('advice/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Advice*/
			/*User*/
			[
				'name'     => __("Users"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-user-circle',
				'children' => [
					[
						'name'    => __("List User"),
						'url'     => url_admin('admin'),
						'visible' => true,
						'icon'    => 'fa-user-circle',
					],
					[
						'name'    => __("Add User"),
						'url'     => url_admin('admin/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*User*/
		];
	}
}