<?php

namespace App\Models\Traits;

use App\Commons\Facade\CFile;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 06/30/2018
 * Time: 23:21
 */

/**
 * Trait ModelTrait
 * @package App\Models\Traits
 * @property Model  $this
 * @property int    id
 * @property string slug
 * @method  static Builder where(string $column, string $operator = null, string $value = null, string $boolean = 'and')
 * @method  static Builder orWhere(string $column, string $operator = null, string $value = null)
 * @method  static Builder|Model findOrFail(mixed | int | string $id, array $column = ['*'])
 * @see     Builder
 */
trait ModelTrait
{
	use Sluggable;
	use SluggableScopeHelpers;

	public function getSlugKeyName() {
		return 'slug';
	}

	/**
	 * set auto upload image in method save
	 * @var bool
	 */
	public $auto_upload_image = true;

	/**
	 * @return string
	 */
	public function fieldSlug() {
		return "slug";
	}

	/**
	 * @return string|array
	 */
	public function fieldSlugable() {
		return '';
	}

	/**
	 * @return array
	 */
	public function sluggable(): array {
		$attribute = key_exists($this->fieldSlug(), $this->getAttributes());
		if (isset($attribute) && $attribute) {
			return [
				$this->fieldSlug() => [
					'source' => $this->fieldSlugable()
				]
			];
		}

		return [];
	}

	/**
	 * @param array $options
	 * @return bool
	 * @throws \Exception
	 */
	public function save(array $options = []) {
		if (!$this->beforeSave()) {
			return $this->beforeSave();
		}
		if (method_exists($this, 'uploadImage') && $this->isAutoUploadImage()) {
			$this->uploadImage();
		}
		$save = parent::save($options);
		if (!$save) {
			if (method_exists($this, 'removeImage') && $this->isAutoUploadImage()) {
				$this->removeImage();
			}

			return false;
		}
		$this->afterSave();

		return $save;
	}

	/**
	 * @return bool
	 */
	public function isAutoUploadImage() {
		return $this->auto_upload_image;
	}

	/**
	 * @param bool $auto_upload_image
	 */
	public function setAutoUploadImage($auto_upload_image) {
		$this->auto_upload_image = $auto_upload_image;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
	 */
	public function getIsActiveLabel() {
		$attribute = $this->getAttribute('is_active');
		if (isset($attribute)) {
			return view('admin.layouts.widget.labels.active', ['slot' => $this->is_active]);
		}

		return "";
	}

	public function beforeSave() {
		return true;
	}

	public function afterSave() {
		return true;
	}

	public static function table() {
		return (new static)->getTable();
	}

	/**
	 * Delete the model from the database.
	 * @return bool|null
	 * @throws \Exception
	 */
	public function delete() {
		parent::delete();
	}

	/**
	 * @param int $value
	 * @return Builder
	 */
	public function whereIsActive($value = 1) {
		return self::where('is_active', $value);
	}

	public function getSlugAndId() {
		if (!empty($this->{$this->getSlugKeyName()})) {
			return $this->{$this->getSlugKeyName()} . "--" . $this->id;
		} else {
			return $this->id;
		}
	}
}