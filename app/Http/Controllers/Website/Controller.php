<?php

namespace App\Http\Controllers\Website;

use App\Commons\CConstant;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct() {
		if (cache()->has('menus')) {
			$menus = Cache::get('menus');
		} else {

			$menus0     = [
				['text' => __('website.home page'), 'url' => url('/')],
				['text' => __('website.product'), 'url' => url('/san-pham')],
			];
			$categories = Category::whereType(Category::TYPE_CATEGORY)->where('is_active', 1)->get();
			$menus1     = $this->getCategoryMenu($categories);
			$menus2     = [
				['text' => __('website.question answer'), 'url' => url('/hoi-dap')],
				['text' => __('website.news'), 'url' => url('/tin-tuc')],
				['text' => __('website.system_store'), 'url' => url('/he-thong-nha-thuoc')],
				['text' => __('website.order'), 'url' => url('/dat-hang')],
			];

			$menus = array_merge($menus0, $menus1, $menus2);
			cache()->put('menus', $menus, 60);
		}
		$current_method = $this->getCurrentMethod();
		view()->share(compact('menus', 'current_method'));
	}

	/**
	 * @param       $categories
	 * @param int   $parent_id
	 * @param array $output
	 * @param int   $level
	 * @return array
	 */
	public function getCategoryMenu($categories, $parent_id = 0, &$output = [], $level = 0) {
		foreach ($categories as $category) {
			/** @var Category $category */
			if ($category->parent_id == $parent_id) {
				if ($category->parent_id == 0) {
					$output[$category->id] = [
						'text'     => $category->name,
						'url'      => url("/danh-muc/" . $category->slug),
						'children' => []
					];
				} else {
					$output[$category->parent_id]['url']                     = "#";
					$output[$category->parent_id]['children'][$category->id] = [
						'text' => $category->name,
						'url'  => url("/danh-muc/" . $category->slug)
					];
					unset($category->id);
				}
				$id = $category->id;
				unset($category->id);
				$this->getCategoryMenu($categories, $id, $output, $level);
			}
		}

		return $output;
	}

	/**
	 * @return string
	 */
	public function getCurrentMethod() {
		$action = Route::currentRouteAction();
		$action = substr($action, strpos($action, '@') + 1);
		if(!$action) {
			return '';
		}
		return $action;
	}
}
