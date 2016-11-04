<?php
require_once("models/model.php");
class Picture extends Model{
	private $id;
	private $title;
	private $path;
	private $thumbnail_path;
	private $camera_model;
	private $lens;
	private $width;
	private $height;
	private $aperture;
	private $exposure_time;
	private $created_at;
	private $uploaded_at;
	private $owner_id;

	function __construct($values)
	{
		$this->id=$values['id'];
		$this->title=$values['title'];
		$this->path=$values['path'];
		$this->thumbnail_path=$values['thumbnail_path'];
		$this->camera_model=$values['camera_model'];
		$this->lens=$values['lens'];
		$this->width=$values['width'];
		$this->height=$values['height'];
		$this->aperture=$values['aperture'];
		$this->exposure_time=$values['exposure_time'];
		$this->created_at=$values['created_at'];
		$this->uploaded_at=$values['uploaded_at'];
		$this->owner_id=$values['owner_id'];
	}

	static function getTableName() {
    	return "pictures";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getThumbnailPath()
    {
        return $this->thumbnail_path;
    }

    /**
     * @return mixed
     */
    public function getCameraModel()
    {
        return $this->camera_model;
    }

    /**
     * @return mixed
     */
    public function getLens()
    {
        return $this->lens;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getAperture()
    {
        return $this->aperture;
    }

    /**
     * @return mixed
     */
    public function getExposureTime()
    {
        return $this->exposure_time;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUploadedAt()
    {
        return $this->uploaded_at;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }


}