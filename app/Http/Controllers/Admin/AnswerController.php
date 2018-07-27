<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class AnswerController
 * @package App\Http\Controllers\Admin
 * @property Answer $model
 */
class AnswerController extends Controller
{
	/**
	 * AnswerController constructor.
	 * @param Answer $model
	 */
	public function __construct(Answer $model) { $this->model = $model; }

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Answer::where('type', Post::TYPE_QUESTION)->get();

		return view('admin.answer.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Answer;

		return view('admin.answer.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(Request $request) {
		$this->model->fill($request->all());
		$this->model->prepareValue($request);
		if ($this->model->save()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(url_admin('create'));
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
		/** @var Answer $model */
		$model = Answer::findOrFail($id);
		$model->prepare();

		return view('admin.answer.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, $id) {
		/** @var Answer $model */
		$model = Answer::findOrFail($id);
		$model->prepareValue($request);
		$model->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
