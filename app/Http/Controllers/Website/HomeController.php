<?php

namespace App\Http\Controllers\Website;

use App\Commons\CConstant;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/**
 * Class HomeController
 * @package App\Http\Controllers\Website
 */
class HomeController extends Controller
{
	/**
	 * HomeController constructor.
	 * Create a new controller instance.
	 */
	public function __construct() {
		$this->middleware('guest');
		parent::__construct();
	}

	/**
	 * Show the application dashboard.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (Cache::has('slides')) {
			$slides = Cache::get('slides');
		} else {
			$slides = Post::whereType(Post::TYPE_SLIDE)->where('is_active', CConstant::STATE_ACTIVE)->get();
			Cache::put('slides', $slides, 60);
		}

		return view('website.home.index', compact('slides'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showProduct() {
		$model = Product::where('post_type', Product::POST_TYPE_DETAIL)->first();

		return view('website.home.product', compact('model'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showAnswerQuestion() {
		$models = Answer::whereType(Post::TYPE_QUESTION)->orderByDesc('created_at')->whereIsActive(1)->paginate(5);

		return view('website.home.question-answer', compact('models'));
	}

	public function showCategory($type) {
		$models = Post::whereType($type)->where('is_active', CConstant::STATE_ACTIVE)->paginate(5);

		return view('website.home.category', compact('models'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showNews() {
		return $this->showCategory(Post::TYPE_NEWS);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showExpert() {
		return $this->showCategory(Post::TYPE_EXPERT);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showShare() {
		return $this->showCategory(Post::TYPE_SHARE);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showSystemStore() {
		/** @var Category $models */
		$models = Category::whereType(Category::TYPE_AREA)->get();

		return view('website.home.system-store', compact('models'));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showOrder() {
		$model = Product::where('post_type', Product::POST_TYPE_DETAIL)->first();

		return view('website.home.order', compact('model'));
	}

	public function postOrder() {

	}

	public function postOrderAjax() {

	}

	/**
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showByCategory($slug) {
		/** @var Category $category */
		$category = Category::findBySlugOrFail($slug);
		if ($category->type == Category::TYPE_STREET) {
			$this->prefixBreadcrumb   = Category::TYPE_STREET;
			$models                   = Store::where('is_active', CConstant::STATE_ACTIVE)->get();
			$this->prefixBreadcrumb   = 'he-thong-nha-thuoc';
			$this->pathInfoBreadcrumb = $category->name;
			$this->getBreadcrumb();

			return view('website.home.store', compact('models'));
		}
		if ($category->type != Category::TYPE_CATEGORY) {
			$models = $category->getChildren()->get();

			if (
			in_array($category->type, [
				Category::TYPE_CITY,
				Category::TYPE_DISTRICT,
				Category::TYPE_AREA
			])) {
				$this->prefixBreadcrumb = 'he-thong-nha-thuoc';
			}
			$this->pathInfoBreadcrumb = $category->name;

			$this->getBreadcrumb();

			return view('website.home.system-store', compact('models'));
		}

		$this->prefixBreadcrumb = Post::TYPE_NEWS;

		$models = Post::where('category_id', $category->id)->where('is_active', CConstant::STATE_ACTIVE)->paginate(5);

		$this->getBreadcrumb();

		return view('website.home.category', compact('models'));

	}

	/**
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showPost($slug) {
		$id   = substr($slug, strpos($slug, '--'));
		$slug = str_replace($id, '', $slug);
		/** @var Post $model */
		$model = Post::findBySlug($slug);

		$this->pathInfoBreadcrumb = $model->title;
		$this->prefixBreadcrumb   = $model->type;
		$this->getBreadcrumb();
		if ($model->type == Post::TYPE_QUESTION) {
			return view('website.home.question-answer-detail', compact('model'));
		}

		return view('website.home.post', compact('model'));
	}

	/**
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showBySlug($slug) {
		if (strpos($slug, '--') == false) {
			return $this->showByCategory($slug);
		}

		return $this->showPost($slug);
	}
}
