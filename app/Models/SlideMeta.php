<?php

namespace App\Models;

use App\Models\Interfaces\IModelMeta;
use App\Models\Traits\ModelMetaTrait;
use App\Models\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SlideMeta
 *
 * @property int $id
 * @property int $meta_id
 * @property string|null $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Admins $authorUpdated
 * @property-read \App\Models\SlideMeta $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta active($value = 1)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta whereSlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta orderBySortOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SlideMeta orderBySortOrderDesc()
 * @property-read \App\Models\Admins $author
 */
class SlideMeta extends Model implements IModelMeta
{
	use ModelTrait;
	use ModelMetaTrait;
    //
	protected $fillable = ['meta_id', 'key', 'value'];

	/**
	 * @return string
	 */
	public function fieldForeignKey() {
		// TODO: Implement fieldForeignKey() method.
		return 'meta_id';
	}
}
