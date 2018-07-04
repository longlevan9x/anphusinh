<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * @package App\Models
 */
class Store extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = ['id_area', 'street', 'address', 'name', 'is_active', 'status', 'phone'];

	/**
	 * @param        $local_key
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
