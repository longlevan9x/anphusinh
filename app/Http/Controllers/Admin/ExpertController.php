<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Post::whereType(Post::TYPE_EXPERT)->get();

		return view('admin.expert.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Post;

		return view('admin.expert.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param PostRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(PostRequest $request) {
		$model       = new Post($request->all());
		$model->type = Post::TYPE_EXPERT;
		$model->setAuthorId();
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

		return view('admin.expert.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$model = Post::findOrFail($id);

		return view('admin.expert.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, $id) {
		/** @var Post $model */
		$model = Post::findOrFail($id);
		$model->fill($request->all());
		$model->setAuthorUpdatedId();
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
		if ($model->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}
}
