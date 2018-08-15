<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Category::whereType()->whereParentId(0)->sortOrder()->get();

		return view('admin.menu.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Category;

		return view('admin.menu.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Category $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(Category $request) {
		$model = new Category;
		$model->fill($request->all());
		$model->save();

		//Store::create($request->all());
		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param Category $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category) {
		$model = $category;

		return view('admin.menu.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id) {
		$model = Category::findOrFail($id);

		return view('admin.menu.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request  $request
	 * @param          $id
	 * @return RedirectResponse|Redirector
	 */
	public function update(Request $request, $id) {
		$category = Category::findOrFail($id);
		$category->fill($request->all());
		$category->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param Category $category
	 * @return RedirectResponse|Redirector
	 * @throws \Exception
	 */
	public function destroy(Category $category) {
		if ($category->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}

	public function showSortOrder() {
		$models = Category::whereParentId(0)->whereType(Category::TYPE_CATEGORY)->orderBy('sort_order')->get();

		return view('admin.menu.sort_order', compact('models'));
	}

	public function postSortOrder(Request $request) {
		$data = [];
		foreach ($request->items as $key => $item) {
			$category             = Category::whereId($item)->first();
			$category->sort_order = $key;
			$category->save();
		}

		return responseJson(CConstant::STATUS_SUCCESS);
	}
}
