<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 07/01/2018
 * Time: 11:36
 */

namespace App\Models\Traits;

use App\Commons\Facade\CFile;
use Illuminate\Database\Eloquent\Model;


/**
 * Trait ModelUploadTrait
 * @package App\Models\Traits
 * @property Model $this
 */
trait ModelUploadTrait
{
	protected $upload_errors;
	/**
	 * @var array|string
	 */
	protected $key_image_upload = ['image'];
	/**
	 * @var array|string
	 */
	protected $key_file_upload = [];

	protected $folder = '';

	/**
	 * @param $folder
	 */
	public function setFolder($folder) {
		$this->folder = $folder;
	}

	/**
	 * @return string
	 */
	public function folder() {
		if (empty($this->folder)) {
			return $this->getTable();
		}

		return $this->folder;
	}

	public function getFolder() {
		return $this->folder();
	}

	/**
	 * @param string $folder
	 * @param string $field_image
	 * @param string $default_image
	 * @return string
	 */
	public function getImagePath($folder = '', $field_image = 'image', $default_image = \App\Commons\CFile::DEFAULT_NO_IMAGE) {
		if (empty($folder)) {
			$folder = $this->folder();
		}

		return CFile::getImageUrl($folder, $this->{$field_image}, $default_image);
	}

	/**
	 * @param string $folder
	 * @param string $field_image
	 * @param string $default_image
	 * @return string
	 */
	public function getImagePathWithoutDefault($folder = '', $field_image = 'image', $default_image = '') {
		return $this->getImagePath($folder, $field_image, $default_image);
	}

	/**
	 * @param string $key
	 * @param string $folder
	 * @param string $old_image
	 * @throws \Exception
	 */
	public function uploadImage($key = '', $folder = '', $old_image = '') {
		if (empty($folder)) {
			$folder = $this->folder();
		}

		if (!empty($key)) {
			if (key_exists($key, $this->getAttributes()) && request()->hasFile($key)) {
				$this->{$item} = CFile::upload($key, $folder, $old_image);
			} else {
				//throw  new \Exception(__("The {$attribute} doesn't exist"));
			}
		}

		$key_upload_image = $this->key_image_upload;

		if (!empty($key_upload_image)) {
			if (is_string($key_upload_image)) {
				$this->upload($key_upload_image, $folder, $old_image);
			}
			if (is_array($key_upload_image)) {
				foreach ($key_upload_image as $key => $item) {
					$this->upload($item, $folder, $old_image);
				}
			}
		}

	}

	/**
	 * @param string $folder
	 * @param string $image
	 * @throws \Exception
	 */
	public function removeImage($folder = '', $image = '') {
		if (empty($folder)) {
			$folder = $this->folder();
		}
		if (empty($image)) {
			$key_image_upload = $this->getKeyImageUpload();
			if (!empty($key_image_upload)) {
				if (is_string($key_image_upload)) {
					$this->remove($folder, $key_image_upload);
				}
				if (is_array($key_image_upload)) {
					foreach ($this->getKeyImageUpload() as $key => $item) {
						$this->remove($folder, $this->{$item});
					}
				}
			}
		} else {
			if (key_exists($image, $this->getAttributes())) {
				CFile::removeFile($folder, $this->{$item});
			} else {
				//throw new \Exception("The {$attribute} doesn't exist");
			}
		}
	}

	/**
	 * @param string $key
	 * @param string $folder
	 * @param string $old_file
	 * @return bool
	 * @throws \Exception
	 */
	public function upload($key = '', $folder = '', $old_file = '') {
		if (key_exists($key, $this->getAttributes()) && request()->hasFile($key)) {
			if ($this->isAutoUploadImage()) {
				$old_file = $this->getOriginal($key);
			}
			/** @var CFile $save */
			$save = CFile::upload($key, $folder, $old_file);
			if (!$save) {
				$this->upload_errors = CFile::getErrors();

				return false;
			}
			$this->{$key} = $save;

			return true;
		}
		if (empty($key)) {
			//throw new \Exception("The {$attribute} doesn't exist");
		}
	}

	/**
	 * @param string $folder
	 * @param string $file
	 * @return bool
	 */
	public function remove($folder = '', $file = '') {
		return CFile::removeFile($folder, $file);
	}

	/**
	 * @return array|string
	 */
	public function getKeyImageUpload() {
		return $this->key_image_upload;
	}

	/**
	 * @param array|string $key_image_upload
	 */
	public function setKeyImageUpload($key_image_upload) {
		$this->key_image_upload = $key_image_upload;
	}

	/**
	 * @return array|string
	 */
	public function getKeyFileUpload() {
		return $this->key_file_upload;
	}

	/**
	 * @param array|string $key_file_upload
	 */
	public function setKeyFileUpload($key_file_upload) {
		$this->key_file_upload = $key_file_upload;
	}

	/**
	 * @return mixed
	 */
	public function getUploadErrors() {
		return $this->upload_errors;
	}

	/**
	 * @param mixed $upload_errors
	 */
	public function setUploadErrors($upload_errors) {
		$this->upload_errors = $upload_errors;
	}

	/**
	 * @param string $key
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getUrlDeleteFile($key) {
		return url_admin("ajax/delete-file", [$this->getTable(), $key, $this->id]);
	}

	/**
	 * @param string $key
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getUrlDeleteImage($key = 'image') {
		return $this->getUrlDeleteFile($key);
	}


	public function showImage($key = '') {
		$attribute = $this->getAttribute($key);
		if (isset($attribute)) {
			$src = $attribute;
			if (!filter_var($attribute, FILTER_VALIDATE_URL)) {
				$src = $this->getImagePath('', $key);
			}

			return view('admin.layouts.widget.image.show', ['src' => $src]);
		}

		return "";
	}
}