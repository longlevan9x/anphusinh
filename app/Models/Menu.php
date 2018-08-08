<?php

namespace App\Models;

use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class Menu
 *
 * @package App\Models
 * @property string title
 * @property int    is_active
 * @property int    sort_order
 * @property string type
 * @property int $id
 * @property string|null $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Admins $authorUpdated
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $title
 * @property int $sort_order
 * @property int $is_active
 * @property string|null $type
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
