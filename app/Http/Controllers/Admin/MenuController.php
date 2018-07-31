<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Menu::all();

		return view('admin.menu.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Menu;

		return view('admin.menu.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param MenuRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(MenuRequest $request) {
		$model = new Menu;
		$model->fill($request->all());
		$model->save();

		//Store::create($request->all());
		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param Menu $menu
	 * @return \Illuminate\Http\Response
	 */
	public function show(Menu $menu) {
		$model = $menu;

		return view('admin.menu.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param Menu $menu
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Menu $menu) {
		$model = $menu;

		return view('admin.menu.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Menu $request
	 * @param Menu $menu
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function update(Menu $request, Menu $menu) {
		$menu->fill($request->all());
		$menu->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param Menu $menu
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function destroy(Menu $menu) {
		if ($menu->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}

	public function showSortOrder() {
		$models = Menu::query()->orderBy('sort_order')->get();

		return view('admin.menu.sort_order', compact('models'));
	}

	public function postSortOrder(Request $request) {
		$data = [];

		foreach ($request->items as $item) {
//			$data =
		}

		Menu::insertOnDuplicateKey($data, ['sort_order']);
	}
}
