<?php

namespace App\Http\Controllers\Admin;

use App\Commons\Facade\CFile;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostMeta;
use Illuminate\Http\Request;
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
		$model = new Post();
		$model->setMaxImageHeight(358);
		$model->setMaxImageWidth(264);
		return view('admin.news.create', compact('model'));
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
		$model   = PostMeta::getValue(PostMeta::KEY_IS_BANNER);
		$content = PostMeta::getValue(PostMeta::KEY_BANNER_CONTENT);
		if (isset($model)) {
			if (isset($content)) {
				$model->setAttribute('content', $content->value);
			}
		}

		return view('admin.news.banner', compact('model'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function doBanner(Request $request) {

		$old_image = '';
		/** @var PostMeta $post */
		$post = PostMeta::where('key', PostMeta::KEY_IS_BANNER)->first();
		if (isset($post) && !empty($post)) {
			$old_image = $post->value;
		}

		$value = CFile::upload('value', PostMeta::table(), $old_image);


		PostMeta::updateOrCreateKeyValue($request->post_id, PostMeta::KEY_IS_BANNER, $value);
		PostMeta::updateOrCreateKeyValue($request->post_id, PostMeta::KEY_BANNER_CONTENT, $request->content);

		return redirect(url_admin('news/banner'));
	}
}
