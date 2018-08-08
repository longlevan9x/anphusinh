<?php

namespace App\Models;

use App\Commons\CConstant;
use App\Models\Traits\ModelTrait;
use DemeterChain\C;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @package App\Models
 * @property string status
 * @property string name
 * @property string phone
 * @property float  price
 * @property float  total_price
 * @property int    product_id
 * @property int    quantity
 * @property int    is_active
 * @property int $id
 * @property string|null $address
 * @property string|null $ipv4
 * @property string|null $city
 * @property string|null $note
 * @property int $author_updated_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Admins $authorUpdated
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAuthorUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIpv4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereSlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $product_id
 * @property string|null $name
 * @property string|null $phone
 * @property int $quantity
 * @property float|null $price
 * @property float|null $total_price
 * @property int $is_active
 * @property string $status
 */
class Order extends Model
{
	use ModelTrait;

	const STATUS_NEW       = 'new';
	const STATUS_SHIPPING  = 'shipping';
	const STATUS_SHIPPED   = 'shipped';
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

	public function showLabelStatus() {
		if ($this->status == self::STATUS_NEW) {
			return view('admin.layouts.widget.labels.info', ['text' => __('admin/order.new order')]);
		}
		elseif ($this->status == self::STATUS_SHIPPING) {
			return view('admin.layouts.widget.labels.warning', ['text' => __('admin/order.shipping')]);
		}
		elseif ($this->status == self::STATUS_SHIPPED) {
			return view('admin.layouts.widget.labels.danger', ['text' => __('admin/order.shipped')]);
		}
	}
}
