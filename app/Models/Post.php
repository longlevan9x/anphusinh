<?php

namespace App\Models;

use App\Commons\Facade\CUser;
use App\Models\Traits\ModelMethodTrait;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use MicrosoftAzure\Storage\Common\Models\RetentionPolicy;

/**
 * Class Post
 * @package App\Models
 * @property string                                                               $title
 * @property string                                                               $type
 * @property string                                                               $post_time
 * @property Admins                                                               $author
 * @property Admins                                                               $authorUpdated
 * @property int                                                                  $author_id
 * @property string                                                               $created_at
 * @property PostMeta                                                             $postMeta
 * @property int                                                                  $id
 * @property int                                                                  $category_id
 * @property string|null                                                          $status
 * @property \Carbon\Carbon|null                                                  $updated_at
 * ===Method===
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostMeta[] $postMetas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereAuthorUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePostTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null                                                             $parent_id
 * @property string|null                                                          $slug
 * @property string|null                                                          $image
 * @property int                                                                  $is_active
 * @property string|null                                                          $overview
 * @property string|null                                                          $content
 * @property string|null                                                          $path
 * @property int|null                                                             $author_updated_id
 * @property-read \App\Models\Category                                            $category
 */
class Post extends Model
{
	use ModelTrait;
	use ModelUploadTrait;

	const TYPE_POST      = 'post';
	const TYPE_NEWS      = 'news';
	const TYPE_SHARE     = 'share';
	const TYPE_QUESTION  = 'question';
	const TYPE_ADVICE    = 'advice';
	const TYPE_SLIDE     = 'slide';
	const TYPE_EXPERT    = 'expert';
	const TYPE_SUBSCRIBE = 'subscribe';
	const TYPE_CONTACT   = 'contact';
	public static $TYPE_NEWS     = self::TYPE_NEWS;
	public static $TYPE_SHARE    = self::TYPE_SHARE;
	public static $TYPE_POST     = self::TYPE_POST;
	public static $TYPE_QUESTION = self::TYPE_QUESTION;
	public static $TYPE_ADVICE   = self::TYPE_ADVICE;
	public static $TYPE_SLIDE    = self::TYPE_SLIDE;
	public static $TYPE_EXPERT   = self::TYPE_EXPERT;

	protected $fillable = [
		'author_id',
		'parent_id',
		'category_id',
		'title',
		'slug',
		'image',
		'is_active',
		'post_time',
		'type',
		'overview',
		'content',
		'status',
		'author_updated_id',
		'path'
	];

	/**
	 * @param string $type
	 */
	public function setType($type = self::TYPE_POST) {
		$this->type = $type;
	}

	/**
	 * @return mixed|string
	 */
	public function getType() {
		if (empty($this->type)) {
			return $this->type = self::$TYPE_POST;
		}

		return $this->type;
	}

	/**
	 * @return string
	 */
	public function fieldSlugable() {
		return 'title';
	}

	/**
	 * @param string $type
	 * @return ModelMethodTrait|Builder
	 */
	public static function whereType($type = self::TYPE_POST) {
		return self::where('type', $type);
	}

	/**
	 * @return string
	 */
	public function parsePostTime() {
		return $this->post_time = Carbon::parse($this->post_time)->format("Y-m-d H:i:s");
	}

	/**
	 * @return bool
	 */
	public function beforeSave() {
		$this->parsePostTime();
		if (in_array($this->getType(), [
			self::TYPE_NEWS,
			self::TYPE_SLIDE,
			self::TYPE_SHARE,
			self::TYPE_ADVICE,
			self::TYPE_EXPERT
		])) {
			$this->path = "post/" . $this->getType();

			return $this->folder = $this->path;
		}

		return true;
	}

	/**
	 * @return mixed|string
	 */
	public function folder() {
		//		if ($this->getType() == self::TYPE_NEWS) {
		//			$this->path = "post/" . self::TYPE_NEWS;
		//
		//			return $this->folder = $this->path;
		//		} elseif ($this->getType() == self::TYPE_ADVICE) {
		//			$this->path = "post/" . self::TYPE_ADVICE;
		//
		//			return $this->folder = $this->path;
		//		} elseif ($this->getType() == self::TYPE_SLIDE) {
		//			$this->path = "post/" . self::$TYPE_SLIDE;
		//
		//			return $this->folder = $this->path;
		//		}

		if (in_array($this->getType(), [
			self::TYPE_NEWS,
			self::TYPE_SLIDE,
			self::TYPE_SHARE,
			self::TYPE_ADVICE,
			self::TYPE_EXPERT
		])) {
			$this->path = "post/" . $this->getType();

			return $this->folder = $this->path;
		}

		if (empty($this->folder)) {
			$this->path = $this->getTable();

			return $this->folder = $this->path;
		}

		return $this->folder;
	}

	/**
	 * @return Model|null|object|static|Category
	 */
	public function category() {
		return $this->belongsTo(Category::class);
	}

	/**
	 * @return string
	 */
	public function getCategoryName() {
		if (isset($this->category)) {
			return $this->category->name;
		}

		return "-";
	}

	public function setAuthorId() {
		return $this->author_id = CUser::userAdmin()->id;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Admins
	 */
	public function author() {
		return $this->belongsTo(Admins::class, 'author_id', 'id');
	}

	/**
	 * @return string
	 */
	public function getAuthorName() {
		if (isset($this->author)) {
			if ($this->author->username == CUser::userAdmin()->username) {
				return __("admin/common.you");
			}

			return $this->author->username;
		}

		return '-';
	}

	public static function pluckWithType($column, $key = null, $type = '') {
		$post = self::where('type', $type)->pluck($column, $key);
		/** @var Collection $post */
		$post->put(0, __('admin.select') . " " . __("admin.$type"));
		$post = $post->toArray();
		ksort($post);

		return new Collection($post);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function postMeta() {
		return $this->hasOne(PostMeta::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function postMetas() {
		return $this->hasMany(PostMeta::class);
	}

	/**
	 * @param string $type
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne|Post
	 */
	public function getParent($type = '') {
		$relate = $this->hasOne(Post::class, 'id', 'parent_id');
		if (!empty($type)) {
			$relate->where('type', $type);
		}

		return $relate;
		//Category::where('id', $this->parent_id)->where('type', $type)->first();
	}

	/**
	 * @return Builder
	 */
	public function queryWithPostMeta() {
		return self::query()->join(PostMeta::table(), PostMeta::table() . '.post_id', '=', Post::table() . '.id');
	}

	/**
	 * @param null $models
	 * @return Post|Builder|mixed
	 */
	public static function prepareMetaValueKey($models = null) {
		if (!isset($models) || empty($models)) {
			$models = (new self)->queryWithPostMeta()->get();
		}

		$model = new self;
		if (isset($models) && !empty($models)) {
			$model = $models->get(0);
			foreach ($models as $index => $item) {
				/** @var PostMeta $item */
				$model->setAttribute($item->key, $item->value);
			}

			return $model;
		}

		return $model;
	}

	/**
	 * Post constructor.
	 * @param array $attributes
	 */
	public function __construct(array $attributes = []) {
		$this->setMaxImageHeight(358);
		$this->setMaxImageWidth(264);
		parent::__construct($attributes);
	}

	/**
	 * @return array|null|string
	 */
	public function getTextActive() {
		if (in_array($this->type, [self::TYPE_SUBSCRIBE, self::TYPE_CONTACT])) {
			return __('admin.new');
		}
	}

	/**
	 * @return array|null|string
	 */
	public function getTextInActive() {
		if (in_array($this->type, [self::TYPE_SUBSCRIBE, self::TYPE_CONTACT])) {
			return __('admin.contacted');
		}
	}
}
