<?php

namespace App\Models;

use App\Models\Traits\ModelMethodTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductMeta
 * @package App\Models
 * @property int    product_id
 * @property string key
 * @property mixed  value
 * @property int    id
 */
class ProductMeta extends Model
{
	protected $fillable = ['product_id', 'key', 'value'];
}
