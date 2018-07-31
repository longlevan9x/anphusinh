<?php

namespace App\Models;

use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class Menu
 * @package App\Models
 * @property string title
 * @property int    is_active
 * @property int    sort_order
 * @property string type
 */
class Menu extends Model
{
	use ModelTrait;
	use InsertOnDuplicateKey;
	protected $fillable = ['title', 'is_active', 'sort_order', 'type', 'slug'];

	public function fieldSlugable() {
		return 'title';
	}
}
