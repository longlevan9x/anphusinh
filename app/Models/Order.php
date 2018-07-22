<?php

namespace App\Models;

use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property string status
 * @property float  price
 * @property float  total_price
 * @property int    product_id
 * @property int    quantity
 */
class Order extends Model
{
	use ModelTrait;

	const STATUS_NEW = 'new';
	protected $fillable = [
		'product_id',
		'name',
		'phone',
		'ipv4',
		'quantity',
		'price',
		'total_price',
		'address',
		'city',
		'is_active',
		'status',
		'note',
		'author_updated_id'
	];

	/**
	 * @return string
	 */
	public function getTextActive() {
		return "Đã duyệt đơn";
	}

	/**
	 * @return string
	 */
	public function getTextInActive() {
		return 'Chưa duyệt đơn';
	}
}
