<?php

namespace App\Models;

use App\Models\Traits\ModelMethodTrait;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yadakhov\InsertOnDuplicateKey;

/**
 * Class PostMeta
 *
 * @package App\Models
 * @property integer post_id
 * @property string  key
 * @property string  value
 * @method static Builder whereKey(string $key)
 * @property int $id
 * @property int|null $post_id
 * @property string|null $key
 * @property string|null $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Admins $authorUpdated
 * @property-read \App\Models\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta whereSlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PostMeta whereValue($value)
 * @mixin \Eloquent
 */
class PostMeta extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
	use InsertOnDuplicateKey;

	const KEY_IS_BANNER      = '_is_banner';
	const KEY_BANNER_CONTENT = '_banner_content';
	protected $fillable = ['post_id', 'key', 'value'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function post() {
		return $this->belongsTo(Post::class, 'post_id', 'id');
	}

	/**
	 * @param int    $post_id
	 * @param string $key
	 * @param string $value
	 * @return int
	 */
	public static function updateKeyValue($post_id, $key, $value) {
		$data = [
			'post_id'    => $post_id,
			'key'        => $key,
			'value'      => $value,
			'created_at' => time(),
			'updated_at' => time()
		];

		return DB::table(self::table())->update($data);
	}

	/**
	 * @param $post_id
	 * @param $key
	 * @param $value
	 * @return Builder|Model
	 */
	public static function updateOrCreateKeyValue($post_id, $key, $value) {
		$data = [
			'post_id'    => $post_id,
			'key'        => $key,
			'value'      => $value,
			'created_at' => time(),
			'updated_at' => time()
		];

		return PostMeta::updateOrCreate(['key' => $key], $data);
	}

	/**
	 * @param $post_id
	 * @param $key
	 * @param $value
	 * @return mixed
	 */
	public static function createKeyValue($post_id, $key, $value) {
		$data = [
			'post_id'    => $post_id,
			'key'        => $key,
			'value'      => $value,
			'created_at' => time(),
			'updated_at' => time()
		];

		return DB::table(self::table())->insert($data);
	}

	/**
	 * @param string $key
	 * @return Model|null|object|static
	 */
	public static function getValue($key) {
		/** @var PostMeta $model */
		$model = self::where('key', $key)->first();
		$model->setAttributeKeyValue();

		return $model;
	}

	public function getValues($post_id) {
		/** @var PostMeta $model */
		$models = self::where('post_id', $post_id)->get();
		$model  = new self;
		if (isset($models) && !empty($models)) {
			$model = $models[0];
			foreach ($models as $index => $item) {
				/** @var PostMeta $item */
				$model->setAttribute($item->key, $item->value);
			}
		}

		return $model;
	}

	/**
	 * @return $this
	 */
	public function setAttributeKeyValue() {
		$this->setAttribute($this->key, $this->value);

		return $this;
	}
}
