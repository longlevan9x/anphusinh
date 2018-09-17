<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SlideRequest;
use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Slide::all();

		return view('admin.slide.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Slide;

		return view('admin.slide.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param SlideRequest $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(SlideRequest $request) {
		$model = new Slide($request->all());
		$model->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param Slide $slide
	 * @return \Illuminate\Http\Response
	 */
	public function show(Slide $slide) {
		$model = $slide;

		return view('admin.slide.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param Slide $slide
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Slide $slide) {
		$model = $slide;

		return view('admin.slide.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param SlideRequest $request
	 * @param Slide        $slide
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(SlideRequest $request, Slide $slide) {
		$slide->fill($request->all());
		$slide->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param Slide $slide
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Slide $slide) {
		if ($slide->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showSortOrder() {
		$models = Slide::query()->orderBy('sort_order')->get();

		return view('admin.slide.sort_order', compact('models'));
	}

	/**
	 * @param SlideRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function postSortOrder(SlideRequest $request) {
		$data = [];
		foreach ($request->items as $key => $item) {
			$model             = Slide::whereId($item)->first();
			$model->sort_order = $key;
			$model->save();
		}

		return responseJson(CConstant::STATUS_SUCCESS);
	}
}
