<?php

namespace App\Http\Controllers\Website;

use App\Commons\CConstant;
use App\Http\Requests\PostRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use function MicrosoftAzure\Storage\Samples\deleteDirectory;

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
		$models = Answer::whereType(Post::TYPE_QUESTION)->latest()->whereIsActive(CConstant::STATE_ACTIVE)->paginate(5);

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

		$relate_posts = Post::whereType($model->type)->latest()->limit(6)->get();

		if ($model->type == Post::TYPE_QUESTION) {
			$this->prefixBreadcrumb = 'hoi-dap';
			$this->getBreadcrumb();

			return view('website.home.question-answer-detail', compact('model', 'relate_posts'));
		} elseif ($model->type == Post::TYPE_ADVICE) {
			$this->prefixBreadcrumb = '';
			$this->getBreadcrumb();

			return view('website.home.advice', compact('model', 'relate_posts'));
		}
		$this->getBreadcrumb();
		/** @var Post $advertise_post */
		$advertise_post = Post::prepareMetaValueKey();

		$product = Product::where('post_type', Product::POST_TYPE_DETAIL)->first();

		return view('website.home.post', compact('model', 'relate_posts', 'advertise_post', 'product'));
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

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function postSubscribe(Request $request) {

		$phone = intval($request->phone);
		if (strlen($phone) < 9 || strlen($phone) > 11) {
			return responseJson(CConstant::STATUS_FAIL, "Số điện thoại không hợp lệ");
		}

		$model = Post::whereType(Post::TYPE_SUBSCRIBE)->where('title', $request->phone)->first();
		if (isset($model) && !empty($model)) {
			return responseJson(CConstant::STATUS_FAIL, "Số điện thoại này đã đăng ký");
		}

		$model = new Post;

		$model->type = Post::TYPE_SUBSCRIBE;

		$model->title    = $request->phone;
		$model->overview = $request->name;

		if ($model->save()) {
			return responseJson(CConstant::STATUS_SUCCESS, 'Xác nhận đăng ký thành công. Yêu cầu tư vấn của bạn đã được chúng tôi tiếp nhận.');
		}

		return responseJson(CConstant::STATUS_FAIL, 'Yêu cầu đăng ký tư vấn của bạn đã thất bại. Xin vui lòng thử lại sau.');
	}
}
