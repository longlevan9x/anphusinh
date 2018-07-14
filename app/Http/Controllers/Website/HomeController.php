<?php

namespace App\Http\Controllers\Website;

use App\Commons\CConstant;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

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
		if(Cache::has('slides')) {
			$slides = Cache::get('slides');
		}
		else {
			$slides = Post::whereType(Post::TYPE_SLIDE)->where('is_active', CConstant::STATE_ACTIVE)->get();
			Cache::put('slides', $slides, 60);
		}
		return view('website.home.index', compact('slides'));
	}

	public function showProduct() {
		$model = Product::where('post_type', Product::POST_TYPE_DETAIL)->first();
		return view('website.home.product', compact('model'));
	}

	public function showAnswerQuestion() {
		return view('website.home.question-answer');
	}

	public function showNews() {
		return view('website.home.news');
	}

	public function showSystemStore() {
		return view('website.home.system-store');
	}

	public function showOrder() {
		return view('website.home.order');
	}

	public function showByCategory($slug) {
		return view('website.home.category');
	}

	public function showByPost($slug) {
		return view('website.home.post');
	}
}
