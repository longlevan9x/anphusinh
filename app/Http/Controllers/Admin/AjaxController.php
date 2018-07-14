<?php

namespace App\Http\Controllers\Admin;

use App\Commons\CConstant;
use App\Commons\Facade\CFile;
use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
	/**
	 * @param $table
	 * @param $key
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deleteFile($table, $key, $id) {
		/** @var Model|ModelTrait $model */
		$model = DB::table($table)->where('id', $id)->first();
		if (isset($model) && !empty($model)) {
			if (key_exists('path', $model) && !empty($model->path)) {
				$folder = $model->path;
			} else {
				$folder = $table;
			}

			if (filter_var($model->{$key}, FILTER_VALIDATE_URL)) {
				DB::table($table)->where('id' , $id)->update([$key => '']);

				return responseJson(CConstant::STATUS_SUCCESS);
			}

			if (CFile::removeFile($folder, $model->{$key})) {
				DB::table($table)->where('id' , $id)->update([$key => '']);

				return responseJson(CConstant::STATUS_SUCCESS);
			}

			return responseJson(1, [], 404);
		}

		return responseJson(1, [], 404);
	}
}
