<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Admins;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDistrictController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->setRoleExcept(Admins::ROLE_AUTHOR);
	}
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Category::where('type', Category::TYPE_DISTRICT)->get();

		return view('admin.category-district.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Category;

		return view('admin.category-district.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param CategoryRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(CategoryRequest $request) {
		$model = new Category;
		$model->fill($request->all());
		$model->type = Category::TYPE_DISTRICT;
		$model->save();

		//Store::create($request->all());
		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$category = Category::findOrFail($id);
		$model    = $category;

		return view('admin.category-district.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id) {
		$category = Category::findOrFail($id);
		$model    = $category;

		return view('admin.category-district.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param CategoryRequest $request
	 * @param                 $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function update(CategoryRequest $request, $id) {
		/** @var Category $category */
		$category = Category::findOrFail($id);
		$category->fill($request->all());
		$category->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function destroy($id) {
		/** @var Category $category */
		$category = Category::findOrFail($id);
		if ($category->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}
}
