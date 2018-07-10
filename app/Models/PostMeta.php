<?php

namespace App\Models;

use App\Models\Traits\ModelMethodTrait;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostMeta
 * @package App\Models
 * @property integer post_id
 * @property string  key
 * @property string  value
 */
class PostMeta extends Model
{
	use ModelMethodTrait;
	use ModelUploadTrait;
	protected $fillable = ['post_id', 'key', 'value'];
}
