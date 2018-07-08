<?php

namespace App\Models;

/**
 * Class Answer
 * @package App\Models
 */

use Illuminate\Http\Request;


/**
 * Class Answer
 * @package App\Models
 * @property  string name
 * @property  string phone
 * @property  string question
 * @property  string answer
 */
class Answer extends Post
{
	/**
	 * @param Request $request
	 * @return string
	 */
	public function parseContent(Request $request) {
		$content = [
			'name'    => $this->name,
			'phone'   => $this->phone,
			'content' => $this->content,
			'answer'  => $request->answer
		];
		return $this->setContent($content);
	}

	/**
	 * @param $content
	 * @return string
	 */
	public function setContent($content) {
		if (is_array($content)) {
			$content = json_encode($content);
			return $this->content = $content;
		}

		if ($this->isJson($content)) {
			return $this -> $content;
		}

		return $this->content = $content;
	}

	/**
	 * @return mixed
	 */
	public function getContent() {
		$content = [];
		if ($this->isJson($this->content)) {
			$content = json_decode($this->content);
		}

		return $content;
	}

	/**
	 * @return mixed
	 */
	public function name() {
		return $this->getContent()->name;
	}

	/**
	 * @return mixed
	 */
	public function phone() {
		return $this->getContent()->phone;
	}

	/**
	 * @return mixed
	 */
	public function question() {
		return $this->getContent()->question;
	}

	/**
	 * @return mixed
	 */
	public function answer() {
		return $this->title;
	}

	public function _content() {
		return $this->getContent()->content;
	}

	function isJson($string) {
		json_decode($string);

		return (json_last_error() == JSON_ERROR_NONE);
	}
}
