<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Area
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $slug
 * @property int $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Area extends Model
{
}
