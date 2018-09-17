<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use App\Models\Facade\SettingFacade;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use function MicrosoftAzure\Storage\Samples\deleteDirectory;

class WebsiteController extends Controller
{
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.website-message');
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

	public function showConfig() {
		$this->setRoleExcept(Admins::ROLE_AUTHOR);
		$this->checkRole();
		$model = SettingFacade::loadModelByKey();
		$model->setMaxLogoWidth(107);
		$model->setMaxLogoHeight(48);

		return view('admin.website.config', compact('model'));
	}

	public function postConfig(Request $request) {
		$this->setRoleExcept(Admins::ROLE_AUTHOR);
		$this->checkRole();
		$model = SettingFacade::prepareKeyValues($request->all(), ['autoload' => 1]);
		$model->prepareKeyValueUploads([Setting::KEY_LOGO, 'website_image'], ['autoload' => 1])->saveModel();

		return redirect(url(self::getConfigUrlAdmin('config')));
	}

	public function showMessage() {
		$model = SettingFacade::loadModelByKey();

		return view('admin.website.message', compact('model'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	public function postMessage(Request $request) {
		$model = SettingFacade::setKeyFillable(Setting::KEY_MESSAGE_ORDER, Setting::KEY_MESSAGE_ORDER_SUCCESS, Setting::KEY_MESSAGE_ORDER_FAIL);
		$model->prepareValue($request->all())->saveModel();

		return redirect(url(self::getConfigUrlAdmin('message')));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showSubscribe() {
		$models = Post::whereType(Post::TYPE_SUBSCRIBE)->latest()->get();

		return view('admin.website.subscribe.index', compact('models'));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function deleteSubscribe($id) {
		/** @var Post $model */
		$model = Post::findOrFail($id);
		if ($model->delete()) {
			return redirect(self::getConfigUrlAdmin('subscribe'));
		}

		return redirect(self::getConfigUrlAdmin('subscribe'))->with('error', "Delete Fail");
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showInformationExpert() {
		$model = SettingFacade::loadModelByKey(['_expert_name', '_expert_image', '_expert_thumbnail', '_expert_phone', '_expert_workplace', '_expert_quote', '_expert_video']);
		$model->setMax_expert_imageHeight(711);
		$model->setMax_expert_imageWidth(591);
		$model->setMax_expert_thumbnailHeight(300);
		$model->setMax_expert_thumbnailWidth(200);
		return view('admin.website.information-expert', compact('model'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Psr\SimpleCache\InvalidArgumentException
	 */
	public function postInformationExpert(Request $request) {
		$model = SettingFacade::prepareKeyValues($request->all(), ['autoload' => 1]);
		$model->prepareKeyValueUploads(['_expert_image', '_expert_thumbnail'], ['autoload' => 1])->saveModel();

		return redirect(url(self::getConfigUrlAdmin('info-expert')));
	}
}
