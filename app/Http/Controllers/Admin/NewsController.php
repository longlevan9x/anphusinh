<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Facade\CFile;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Post::whereType(Post::TYPE_NEWS)->get();

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
	 * @param PostRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(PostRequest $request) {
		$model       = new Post($request->all());
		$model->type = Post::TYPE_NEWS;
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

		return view('admin.news.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$model = Post::findOrFail($id);

		return view('admin.news.update', compact('model'));
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

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showBanner() {
		$model = PostMeta::where('key', 'is_banner')->first();

		return view('admin.news.banner', compact('model'));
	}

	public function doBanner(Request $request) {
		$old_image = '';
		/** @var PostMeta $post */
		$post = PostMeta::where('key', 'is_banner')->first();
		if (isset($post) && !empty($post)) {
			$old_image = $post->value;
		} else {
			$post = new PostMeta;
		}
		/** @var PostMeta $request */
		$post->post_id = $request->post_id;
		$post->key     = 'is_banner';
		$post->value   = CFile::upload('image', 'post_meta', $old_image);
		$post->save();
		return redirect(url_admin('news/banner'));
	}
}
