<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
	protected $fillable = ['post_id', 'key', 'value'];
}
