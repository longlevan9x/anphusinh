<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facade\SettingFacade;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.website-message');
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
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
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

	public function showConfig() {
		$model = SettingFacade::loadModelByKey();

		return view('admin.website.config', compact('model'));
	}

	public function postConfig(Request $request) {
		$model = SettingFacade::prepareKeyValues($request->all());
		$model->prepareKeyValueUploads([Setting::KEY_LOGO])->saveModel();

		return redirect(url(self::getConfigUrlAdmin('config')));
	}

	public function showMessage() {
		$model = SettingFacade::loadModelByKey();

		return view('admin.website.message', compact('model'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function postMessage(Request $request) {
		$model = SettingFacade::setKeyFillable(Setting::KEY_MESSAGE_ORDER, Setting::KEY_MESSAGE_ORDER_SUCCESS, Setting::KEY_MESSAGE_ORDER_FAIL);
		$model->prepareValue($request->all())->saveModel();

		return redirect(url(self::getConfigUrlAdmin('message')));
	}
}
