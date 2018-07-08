<?php

namespace App\Models;

use App\Commons\Facade\CUser;
use App\Models\Traits\ModelTrait;
use App\Models\Traits\ModelUploadTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Post
 * @package App\Models
 * @property string   $title
 * @property string   $type
 * @property string   $post_time
 * @property Category category
 * @property Admins   $author
 * @property Admins   $authorUpdated
 * @property int      $author_id
 * @property int      author_updated_id
 * @property mixed    content
 */
class Post extends Model
{
	use ModelTrait;
	use ModelUploadTrait;
	const TYPE_POST     = 'post';
	const TYPE_NEWS     = 'news';
	const TYPE_QUESTION = 'question';
	const TYPE_ADVICE   = 'advice';
	public static $TYPE_NEWS     = self::TYPE_NEWS;
	public static $TYPE_POST     = self::TYPE_POST;
	public static $TYPE_QUESTION = self::TYPE_QUESTION;
	public static $TYPE_ADVICE   = self::TYPE_ADVICE;

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
		'author_updated_id'
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
	 * @param string $type
	 * @return Builder
	 */
	public static function whereType($type = self::TYPE_POST) {
		return Post::where('type', $type);
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
		if ($this->getType() == self::TYPE_NEWS) {
			$this->folder = 'post/news';
		}

		return true;
	}

	/**
	 * @return mixed|string
	 */
	public function folder() {
		if ($this->getType() == self::TYPE_NEWS) {
			return $this->folder = 'post/news';
		}
		elseif ($this->getType() == self::TYPE_ADVICE) {
			return $this->folder = 'post/advice';
		}
		if (empty($this->folder)) {
			return $this->folder = $this->getTable();
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

	public function setAuthorUpdatedId() {
		return $this->author_updated_id = CUser::userAdmin()->id;
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
				return "You";
			}

			return $this->author->username;
		}

		return '-';
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Admins
	 */
	public function authorUpdated() {
		return $this->belongsTo(Admins::class, 'author_updated_id', 'id');
	}

	/**
	 * @return string
	 */
	public function getAuthorUpdatedName() {
		if (isset($this->authorUpdated)) {
			if ($this->authorUpdated->username == CUser::userAdmin()->username) {
				return "You";
			}

			return $this->authorUpdated->username;
		}

		return '-';
	}
}
