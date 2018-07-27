<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Post::whereType(Post::TYPE_SLIDE)->get();

		return view('admin.slide.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Post;

		return view('admin.slide.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param PostRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(PostRequest $request) {
		/** @var Post $model */
		$model = new Post($request->all());
		if ($request->type_link != 'to_post') {
			$model->parent_id = 0;
			if ($request->type_link == 'to_link_out') {
				$model->slug = $request->link;
			}
			else {
				$model->slug = "";
			}
		}
		elseif ($request->type_link == 'to_post') {
			/** @var Post $parent */
			$parent = $model->getParent()->first();
			if ($request->select_image == 'from_post') {
				$model->setAutoUploadImage(false);
				$model->image = $parent->getImagePath();
				$model->path  = $parent->path;
			}
			$model->slug = "{$parent->slug}-{$parent->id}";
		}

		$content        = [
			'type_link'    => $request->type_link,
			'select_image' => $request->select_image
		];
		$model->content = json_encode($content);

		$model->type = Post::TYPE_SLIDE;
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
		/** @var Post $model */
		$model   = Post::findOrFail($id);
		$content = json_decode($model->content);
		$model->setAttribute('type_link', $content->type_link);
		$model->setAttribute('select_image', $content->select_image);
		$model->setAttribute('link', $model->slug);

		return view('admin.slide.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		/** @var Post $model */
		$model   = Post::findOrFail($id);
		$content = json_decode($model->content);
		$model->setAttribute('type_link', $content->type_link);
		$model->setAttribute('select_image', $content->select_image);
		$model->setAttribute('link', $model->slug);

		return view('admin.slide.update', compact('model'));
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
		if ($request->type_link != 'to_post') {
			$model->parent_id = 0;
			if ($request->type_link == 'to_link_out') {
				$model->slug = $request->link;
			}
			else {
				$model->slug = null;
			}
		}
		elseif ($request->type_link == 'to_post') {
			/** @var Post $parent */
			$parent = $model->getParent()->first();
			if ($request->select_image == 'from_post') {
				$model->setAutoUploadImage(false);
				$model->removeImage($model->path);
				$model->image = $parent->getImagePath();
				$model->path  = $parent->path;
			}
			$model->slug = "{$parent->slug}-{$parent->id}";
		}
		$content        = [
			'type_link'    => $request->type_link,
			'select_image' => $request->select_image
		];
		$model->content = json_encode($content);

		$model->type = Post::TYPE_SLIDE;
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
