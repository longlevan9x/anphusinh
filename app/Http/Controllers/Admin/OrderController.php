<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Order::all();

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
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
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
	 * @param Order $order
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
	 * @param Order $order
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
