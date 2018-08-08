<?php

namespace App\Models;

use App\Models\Traits\ModelMethodTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductMeta
 *
 * @package App\Models
 * @property int    product_id
 * @property string key
 * @property mixed  value
 * @property int    id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductMeta whereValue($value)
 * @mixin \Eloquent
 * @property int $id
 * @property int $product_id
 * @property string $key
 * @property string $value
 */
class ProductMeta extends Model
{
	protected $fillable = ['product_id', 'key', 'value'];
}
