<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 * @property Product $model
 */
class ProductController extends Controller
{
	public function __construct(Product $product) { $this->model = $product; }

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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

	public function _index() {
		/** @var Product $model */
		$model = Product::where('post_type', 'detail')->limit(1)->first();
		$model->setAttribute('element' , $model->productMetaByKey('_element')->first()->value);
		return view('admin.product._index', compact('model'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function _store(Request $request) {
		$model = Product::where('post_type', 'detail')->limit(1)->first();
		$flag = 0;
		if (isset($model) && !empty($model)) {
			$this->model = $model;
			$flag = 1;
		}
		$this->model->fill($request->all());
		$this->model->post_type = 'detail';
		$this->model->is_active = CConstant::STATE_ACTIVE;
		$this->model->setAuthorId();
		$this->model->save();
		$check = $this->model->setProductMeta('_element', $request->element);
		if ($check) {
			return redirect(url_admin('product/detail'))->with('success', $flag == 1 ? __('message.update success') : __('message.create new success'));
		}
		return redirect(url_admin('product/detail'))->with('fail', $flag == 1 ? __('message.update fail') : __('message.create new fail'));
	}
}
