<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Facade\CUser;
use App\Models\Admins;
use App\Models\Order;
use App\Models\Post;
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
		$totalPost         = Post::whereType(Post::TYPE_NEWS)->count();
		$totalNews         = Post::whereType(Post::TYPE_POST)->count();
		$totalOrder        = Order::query()->count();

		return view('admin.dashboard.index', compact('totalPost', 'totalNews', 'totalOrder', 'totalNewContact', 'totalNewSubscribe'));
	}

}
