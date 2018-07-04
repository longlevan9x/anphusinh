<?php

namespace App\Models;

use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed type
 */
class Post extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
    const TYPE_NEWS = 'news';
    public static $TYPE_NEWS  = self::TYPE_NEWS;
}
