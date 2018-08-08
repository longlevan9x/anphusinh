<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Facade\CUser;
use App\Models\Admins;
use App\Models\Answer;
use App\Models\Order;
use App\Models\Post;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct() {
		$this->middleware('admin');
		parent::__construct();
	}

	/**
	 * Show the application dashboard.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$totalPost   = Post::whereType(Post::TYPE_NEWS)->count();
		$totalNews   = Post::whereType(Post::TYPE_POST)->count();
		$totalOrder  = Order::query()->count();
		$totalStore  = Store::query()->count();
		$totalAnswer = Answer::whereType(Post::TYPE_QUESTION)->count();

		$question_answer = Answer::whereType(Post::TYPE_QUESTION)->latest()->whereIsActive(0)->limit(5)->get();

		return view('admin.dashboard.index', compact('totalPost', 'totalNews', 'totalOrder', 'totalStore', 'totalAnswer', 'question_answer'));
	}

}
