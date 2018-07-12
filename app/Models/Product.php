<?php

namespace App\Models;

use App\Commons\Facade\CUser;
use App\Models\Traits\ModelMethodTrait;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property string  post_type
 * @property integer is_active
 * @property int     author_id
 * @property int     id
 */
class Product extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
	use ModelMethodTrait;

	protected $fillable = [
		'author_id',
		'image',
		'name',
		'slug',
		'category_id',
		'price',
		'price_sale',
		'quantity',
		'is_active',
		'status',
		'content',
		'overview',
		'post_time',
		'post_type',
		'path',
		'admin_id'
	];

	/**
	 * @return string
	 */
	public function fieldSlugable() {
		return 'name';
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function productMetas() {
		return $this->hasMany(ProductMeta::class);
	}

	/**
	 * @param string $key
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne|ProductMeta
	 */
	public function productMetaByKey($key = '') {
		return $this->hasOne(ProductMeta::class)->where('key', $key);
	}

	/**
	 * @return int
	 */
	public function setAuthorId() {
		return $this->author_id = CUser::userAdmin()->id;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Admins
	 */
	public function author() {
		return $this->belongsTo(Admins::class, 'author_id', 'id');
	}

	/**
	 * @return string
	 */
	public function getAuthorName() {
		if (isset($this->author)) {
			if ($this->author->username == CUser::userAdmin()->username) {
				return __("admin/common.you");
			}

			return $this->author->username;
		}

		return '-';
	}

	/**
	 * @param string $key
	 * @param        $value
	 * @return bool
	 */
	public function setProductMeta($key = '', $value) {
		$meta = $this->productMetaByKey($key);
		/** @var ProductMeta $model */
		$model = $meta->first();
		if (isset($model) && !empty($model)) {
			//$id_meta = $model->id;
			$model->value = $value;
		} else {
			$model = new ProductMeta(['key' => $key, 'value' => $value, 'product_id' => $this->id]);
		}

		if ($meta->save($model)) {
			return true;
		}

		return false;
	}

	/**
	 * @param $attribute
	 * @param $key
	 * @return $this
	 */
	public function setAttributeMeta($attribute, $key) {
		/** @var ProductMeta $meta */
		$meta  = $this->productMetaByKey($key)->first();
		$value = '';
		if (isset($meta) && !empty($meta)) {
			$value = $meta->value;
		}
		$this->setAttribute($attribute, $value);

		return $this;
	}
}
