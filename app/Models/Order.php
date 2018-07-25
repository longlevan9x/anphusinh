<?php

namespace App\Models;

use App\Commons\CConstant;
use App\Models\Traits\ModelTrait;
use DemeterChain\C;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property string status
 * @property string name
 * @property string phone
 * @property float  price
 * @property float  total_price
 * @property int    product_id
 * @property int    quantity
 * @property int    is_active
 */
class Order extends Model
{
	use ModelTrait;

	const STATUS_NEW       = 'new';
	const STATE_ACCEPT     = CConstant::STATE_ACTIVE;
	const STATE_CANCEL     = 2;
	const STATE_NOT_ACCEPT = CConstant::STATE_INACTIVE;

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

	public function getOtherTextActive() {
		if ($this->is_active == self::STATE_CANCEL) {
			return "Đơn hàng đã hủy";
		}
	}
}
