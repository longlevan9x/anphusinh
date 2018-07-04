<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Post::where('type', 'news')->get();

		return view('admin.news.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$model = new Post;
		$model->fill($request->all());
		$model->type = Post::TYPE_NEWS;
		$model->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$model = Post::findOrFail($id);
		return view('admin.news.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$model = Post::findOrFail($id);
		return view('admin.category.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		/** @var Post $model */
		$model = Post::findOrFail($id);
		$model->fill($request->all());
		$model->save();
		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy($id) {
		/** @var Post $model */
		$model = Post::findOrFail($id);
		if  ($model->delete()) {
			return redirect(self::getUrlAdmin());
		}
		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}
}
