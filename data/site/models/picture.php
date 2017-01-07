<?php
require_once(__DIR__ . "/model.php");

class Picture extends Model {
	private $id;
	private $title;
	private $path;
	private $thumbnail_path;
	private $price;
	private $camera_model;
	private $lens;
	private $width;
	private $height;
	private $aperture;
	private $exposure_time;
	private $created_at;
	private $uploaded_at;
	private $owner_id;
	private $description;

	function __construct($values) {
		parent::__construct();
		$this->id = $values['id'];
		$this->title = $values['title'];
		$this->path = $values['path'];
		$this->price = $values['price'];
		$this->thumbnail_path = $values['thumbnail_path'];
		$this->camera_model = $values['camera_model'];
		$this->lens = $values['lens'];
		$this->width = $values['width'];
		$this->height = $values['height'];
		$this->aperture = $values['aperture'];
		$this->exposure_time = $values['exposure_time'];
		$this->created_at = $values['created_at'];
		$this->uploaded_at = $values['uploaded_at'];
		$this->owner_id = $values['owner_id'];
		$this->description = $values['description'];
	}

	static function getTableName() {
		return "pictures";
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return mixed
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * @return mixed
	 */
	public function getThumbnailPath() {
		return $this->thumbnail_path;
	}

	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @return mixed
	 */
	public function getCameraModel() {
		return $this->camera_model;
	}

	/**
	 * @return mixed
	 */
	public function getLens() {
		return $this->lens;
	}

	/**
	 * @return mixed
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * @return mixed
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @return mixed
	 */
	public function getAperture() {
		return $this->aperture;
	}

	/**
	 * @return mixed
	 */
	public function getExposureTime() {
		return $this->exposure_time;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedAt() {
		return $this->created_at;
	}

	/**
	 * @return mixed
	 */
	public function getUploadedAt() {
		return $this->uploaded_at;
	}

	/**
	 * @return mixed
	 */
	public function getOwnerId() {
		return $this->owner_id;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	public function getOwner(){
		return User::find_by(['id' => $this->getOwnerId()]);
	}

	protected function has_and_belongs_to_many() {
		return ["tags" => [
			"class_name" => "Tag",
			"join_table" => "pictures_tags",
			"foreign_key" => "picture_id",
			"association_key" => "tag_id"]
		];
	}

	protected function has_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}
}