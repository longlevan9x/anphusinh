<?php

namespace App\Models;

use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 *
 * @package App\Models
 * @property int $id
 * @property int|null $id_area
 * @property string|null $street
 * @property string $name
 * @property string|null $address
 * @property int|null $is_active
 * @property string|null $status
 * @property string|null $phone
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Admins $authorUpdated
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereIdArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereSlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store active($value = 1)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store orderBySortOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store orderBySortOrderDesc()
 * @property-read \App\Models\Admins $author
 */
class Store extends Model
{
	use ModelTrait;
	/**
	 * @var array
	 */
	protected $fillable = ['id_area', 'street', 'address', 'name', 'is_active', 'status', 'phone'];

	/**
	 * @param string $local_key
	 * @param string $type
	 * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne|null|object
	 */
	public function category($local_key, $type = '') {
		return $this->hasOne(Category::class, 'id', $local_key)->first();
	}

	/**
	 * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne|null|object
	 */
	public function categoryArea() {
		return $this->category('id_area');
	}

	/**
	 * @return mixed|string
	 */
	public function getAreaName() {
		$category = $this->categoryArea();
		if (isset($category)) {
			return $this->categoryArea()->name;
		}

		return '';
	}

	/**
	 * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne|null|object
	 */
	public function categoryStreet() {
		return $this->category('street');
	}

	/**
	 * @return mixed|string
	 */
	public function getStreetName() {
		$category = $this->categoryStreet();
		if (isset($category)) {
			return $this->categoryStreet()->name;
		}

		return '';
	}
}
