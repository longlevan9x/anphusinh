<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Models\Admins;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	/**
	 * OrderController constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->setRoleExcept(Admins::ROLE_AUTHOR);
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Order::query()->orderBy('status')->orderBy('is_active')->latest()->get();

		return view('admin.order.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param Order $order
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Order $order) {
		$model = $order;

		return view('admin.order.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param Order                     $order
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function update(Request $request, Order $order) {
		$order->fill($request->all());
		$order->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function confirm($id) {
		/** @var Order $model */
		$model = Order::findOrFail($id);

		$model->is_active = CConstant::STATE_ACTIVE;
		$model->save();

		return redirect()->back();
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function cancel($id) {
		/** @var Order $model */
		$model = Order::findOrFail($id);

		$model->is_active = Order::STATE_CANCEL;
		$model->save();

		return redirect()->back();
	}
}
