<?php

namespace App\Models;

/**
 * Class Answer
 * @package App\Models
 */

use App\Commons\CConstant;
use App\Models\Traits\ModelTrait;
use Illuminate\Http\Request;


/**
 * Class Answer
 *
 * @package App\Models
 * @property string name
 * @property string phone
 * @property string question
 * @property string answer
 * @property string  content_question
 * @property int $id
 * @property int $author_id
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $slug
 * @property int $category_id
 * @property string|null $image
 * @property int $is_active
 * @property string|null $post_time
 * @property string|null $type
 * @property string|null $overview
 * @property string|null $content
 * @property string|null $status
 * @property string|null $path
 * @property int|null $author_updated_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Admins $author
 * @property-read \App\Models\Admins|null $authorUpdated
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\PostMeta $postMeta
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostMeta[] $postMetas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereAuthorUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer wherePostTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Answer extends Post
{
	/**
	 * @var string
	 */
	public $name = '';
	/**
	 * @var string
	 */
	public $phone = '';
	/**
	 * @var string
	 */
	public $answer = '';
	/**
	 * @var string
	 */
	public $question = '';
	/**
	 * @var string
	 */
	public $content_question = '';

	/**
	 * @return string
	 */
	public function fieldSlugable() {
		return 'title';
	}

	/**
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * @param Request $request
	 */
	public function prepareValue(Request $request) {
		$this->name             = $request->name;
		$this->phone            = $request->phone;
		$this->answer           = $request->answer;
		$this->content_question = $request->content_question;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->getContent()->name ?? $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getPhone(): string {
		return $this->getContent()->phone ?? $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone(string $phone): void {
		$this->phone = $phone;
	}

	/**
	 * @return string
	 */
	public function getQuestion(): string {
		return $this->title;
	}

	/**
	 * @param string $question
	 */
	public function setQuestion(string $question): void {
		$this->question = $question;
	}

	/**
	 * @return string
	 */
	public function getAnswer(): string {
		return $this->getContent()->answer ?? $this->answer;
	}

	/**
	 * @param string $answer
	 */
	public function setAnswer(string $answer): void {
		$this->answer = $answer;
	}

	/**
	 * @return string
	 */
	public function getContentQuestion(): string {
		return $this->getContent()->content_question ?? $this->question;
	}

	/**
	 * @param string $content_question
	 */
	public function setContentQuestion(string $content_question): void {
		$this->content_question = $content_question;
	}

	/**
	 * @param $content
	 * @return string
	 */
	public function setContent() {
		$content = json_encode([
			'name'             => $this->name,
			'phone'            => $this->phone,
			'content_question' => $this->content_question,
			'answer'           => $this->answer
		]);

		return $this->content = $content;
	}

	/**
	 * @return mixed|Answer
	 */
	public function getContent() {
		$content = [];
		if ($this->isJson($this->content)) {
			$content = json_decode($this->content);
		}

		return $content;
	}


	/**
	 * @param $string
	 * @return bool
	 */
	function isJson($string) {
		json_decode($string);

		return (json_last_error() == JSON_ERROR_NONE);
	}

	/**
	 * @return bool
	 */
	public function beforeSave() {
		$this->setType(self::TYPE_QUESTION);
		$this->setAuthorId();
		$this->content = $content = $this->setContent();
		if (!empty($this->answer)) {
			$this->is_active = CConstant::STATE_ACTIVE;
		} else {
			$this->is_active = CConstant::STATE_INACTIVE;
		}

		return parent::beforeSave(); // TODO: Change the autogenerated stub
	}

	public function prepare() {
		$this->name             = $this->getName();
		$this->phone            = $this->getPhone();
		$this->content_question = $this->getContentQuestion();
		$this->answer           = $this->getAnswer();
	}

	public function showStatus() {
		if ($this->is_active) {
			return view('admin.layouts.widget.labels.success', ['text' => __('admin/q-a.answered')]);
		}

		return view('admin.layouts.widget.labels.danger', ['text' => __('admin/q-a.not answer')]);
	}
}
