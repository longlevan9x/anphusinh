<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Store::all();

		return view('admin.store.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Store;

		return view('admin.store.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param StoreRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(StoreRequest $request) {
		$model = new Store;
		$model->fill($request->all());
		$model->save();

		//Store::create($request->all());
		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param Store $store
	 * @return \Illuminate\Http\Response
	 */
	public function show(Store $store) {
		$model = $store;

		return view('admin.store.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param Store $store
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Store $store) {
		$model = $store;

		return view('admin.store.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param StoreRequest $request
	 * @param Store        $store
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(StoreRequest $request, Store $store) {
		$store->fill($request->all());
		$store->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param Store $store
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function destroy(Store $store) {
		if ($store->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}
}
