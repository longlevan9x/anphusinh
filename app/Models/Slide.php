<?php

namespace App\Models;

use App\Models\Traits\ModelMethodTrait;
use App\Models\Traits\ModelRelateTrait;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slide
 *
 * @property int                             $id
 * @property string|null                     $name
 * @property string|null                     $description
 * @property string|null                     $url
 * @property string|null                     $image
 * @property int                             $is_active
 * @property int                             $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUrl($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Admins         $authorUpdated
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide active($value = 1)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereSlug($slug)
 * @property int|null                        $author_id
 * @property int|null                        $author_update_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide orderBySortOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide orderBySortOrderDesc()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereAuthorUpdateId($value)
 * @property-read \App\Models\Admins|null $author
 */
class Slide extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
	//
	protected $fillable = ['name', 'description', 'url', 'image', 'is_active', 'sort_order'];

}
