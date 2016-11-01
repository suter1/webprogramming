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
		$this->id=$values('id');
		$this->title=$values('title');
		$this->path=$values('path');
		$this->thumbnail_path=$values('thumbnail_path');
		$this->camera_model=$values('camera_model');
		$this->lens=$values('lens');
		$this->width=$values('width');
		$this->height=$values('height');
		$this->aperture=$values('aperture');
		$this->exposure_time=$values('exposure_time');
		$this->created_at=$values('created_at');
		$this->uploaded_at=$values('uploaded_at');
		$this->owner_id=$values('owner_id');
	}

	static function getTableName() {
    	return "pictures";
    }
}