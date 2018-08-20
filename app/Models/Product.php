<?php

namespace App\Models;

use App\Commons\Facade\CUser;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property string|null                   $image
 * @property string|null                   $slug
 * @property int|null                      $category_id
 * @property float|null                    $price_sale
 * @property int|null                      $quantity
 * @property string|null                   $status
 * @property string|null                   $post_time
 * @property string|null                   $path
 * @property int                           $id
 * @property int|null                      $author_id
 * @property string                        $name
 * @property float|null                    $price
 * @property int|null                      $is_active
 * @property string|null                   $content
 * @property string|null                   $overview
 * @property string|null                   $post_type
 * @property int|null                      $admin_id
 * @property Carbon|null                   $created_at
 * @property Carbon|null                   $updated_at
 * @property-read Admins|null              $author
 * @property-read Admins                   $authorUpdated
 * @property-read ProductMeta              $productMetaByKey
 * @property-read Collection|ProductMeta[] $productMetas
 * @method static Builder|Product findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Product whereAdminId($value)
 * @method static Builder|Product whereAuthorId($value)
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereContent($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImage($value)
 * @method static Builder|Product whereIsActive($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereOverview($value)
 * @method static Builder|Product wherePath($value)
 * @method static Builder|Product wherePostTime($value)
 * @method static Builder|Product wherePostType($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriceSale($value)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Product extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
	const POST_TYPE_DETAIL = 'detail';

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
		'seo_title',
		'seo_keyword',
		'seo_description',
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
	public function setProductMeta($key = '', $value = '') {
		$meta = $this->productMetaByKey($key);
		/** @var ProductMeta $model */
		$model = $meta->first();
		if (isset($model) && !empty($model)) {
			//$id_meta = $model->id;
			$model->value = $value;
		}
		else {
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
