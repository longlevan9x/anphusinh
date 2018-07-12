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
				'name'     => __("admin/menu.dashboard"),
				'url'      => url_admin('/'),
				'visible'  => true,
				'icon'     => 'fa-home',
				'children' => []
			],
			/*Dashboard*/
			/*Profile*/
			[
				'name'     => __("admin/menu.your_profile"),
				'url'      => url_admin('profile'),
				'visible'  => true,
				'icon'     => 'fa-user-circle-o',
				'children' => []
			],
			/*Profile*/
			/*Product*/
			[
				'name'     => __("admin/menu.Product"),
				'url'      => url_admin('product'),
				'visible'  => true,
				'icon'     => 'fa-user-circle-o',
				'children' => []
			],
			/*Product*/
			/*News*/
			[
				'name'     => __('admin/menu.News'),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __('admin/menu.list_news'),
						'url'     => url_admin('news'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __('admin/menu.add_news'),
						'url'     => url_admin('news/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
					[
						'name'    => __("admin/menu.setting_banner"),
						'url'     => url_admin('news/banner'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*News*/
			/*Post*/
			[
				'name'     => __("admin/menu.post"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __("admin/menu.list"),
						'url'     => url_admin('post'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __("admin/menu.add_new"),
						'url'     => url_admin('post/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Post*/
			/*Category*/
			[
				'name'     => __("admin/menu.category"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => [
					[
						'name'    => __("admin/menu.list"),
						'url'     => url_admin('category'),
						'visible' => true,
						'icon'    => 'fa-list-alt',
					],
					[
						'name'    => __("admin/menu.add_new"),
						'url'     => url_admin('category/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Category*/
			/*System Store*/
			[
				'name'     => __("admin/menu.system_store"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-globe',
				'children' => [
					/*Store*/
					[
						'name'     => __("admin/menu.store"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-cube',
						'children' => [
							[
								'name'    => __("admin/menu.list store"),
								'url'     => url_admin('store'),
								'visible' => true,
								'icon'    => 'fa-cube',
							],
							[
								'name'    => __("admin/menu.add store"),
								'url'     => url_admin('store/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*Store*/
					/*Area*/
					[
						'name'     => __("admin/menu.area"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("admin/menu.list"),
								'url'     => url_admin('area'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("admin/menu.add"),
								'url'     => url_admin('area/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*Area*/
					/*City*/
					[
						'name'     => __("admin/menu.city"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("admin/menu.list"),
								'url'     => url_admin('category-city'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("admin/menu.add"),
								'url'     => url_admin('category-city/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*City*/
					/*District*/
					[
						'name'     => __("admin/menu.district"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("admin/menu.list"),
								'url'     => url_admin('category-district'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("admin/menu.add"),
								'url'     => url_admin('category-district/create'),
								'visible' => true,
								'icon'    => 'fa-plus',
							],
						]
					],
					/*District*/
					/*Street*/
					[
						'name'     => __("admin/menu.street"),
						'url'      => '#',
						'visible'  => true,
						'icon'     => 'fa-globe',
						'children' => [
							[
								'name'    => __("admin/menu.list"),
								'url'     => url_admin('category-street'),
								'visible' => true,
								'icon'    => 'fa-globe',
							],
							[
								'name'    => __("admin/menu.add"),
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
				'name'     => __("admin/menu.q & a"),
				'url'     => url_admin('answer'),
				'visible'  => true,
				'icon'     => 'fa-list-alt',
				'children' => []
			],
			/*Q & A*/
			/*Advice*/
			[
				'name'     => __("admin/menu.advices"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-user-circle',
				'children' => [
					[
						'name'    => __("admin/menu.list"),
						'url'     => url_admin('advice'),
						'visible' => true,
						'icon'    => 'fa-user-circle',
					],
					[
						'name'    => __("admin/menu.add"),
						'url'     => url_admin('advice/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*Advice*/
			/*User*/
			[
				'name'     => __("admin/menu.users"),
				'url'      => '#',
				'visible'  => true,
				'icon'     => 'fa-user-circle',
				'children' => [
					[
						'name'    => __("admin/menu.list user"),
						'url'     => url_admin('admin'),
						'visible' => true,
						'icon'    => 'fa-user-circle',
					],
					[
						'name'    => __("admin/menu.add user"),
						'url'     => url_admin('admin/create'),
						'visible' => true,
						'icon'    => 'fa-plus',
					],
				]
			],
			/*User*/
			/*Setting*/
			[
				'name'     => __("admin/menu.setting"),
				'url'      => url_admin('setting'),
				'visible'  => true,
				'icon'     => 'fa-cog',
				'children' => []
			],
			/*Setting*/
		];
	}
}