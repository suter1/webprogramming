<?php
require_once("autoload.php");

class DetailController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['show'];
	}

	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$picture_id = $params[2];
		$loc_buy = Localization::find_by(['qualifier' => 'buy', 'lang' => get_language()])->getValue();
		$picture = Picture::find_by(['id' => $picture_id]);
		$user = User::find_by(['id' => $picture->getOwnerId()]);
		$translations = [];
		foreach (['camera_model', 'description', 'owner', 'lens', 'aperture', 'title', 'price', 'exposure_time', 'created_at', 'uploaded_at', 'size'] as $translate) {
			$translations["lang_$translate"] = Localization::find_by(['lang' => get_language(), 'qualifier' => $translate])->getValue();
		}
		load_template("views/detail/show.php", array_merge([
			'id'   => $picture_id,
			'owner_id' => $picture->getOwnerId(),
			'path' => $picture->getThumbnailPath(),
			'title' => $picture->getTitle(),
			'price' => $picture->getPrice(),
			'camera_model' => $picture->getCameraModel(),
			'lens' => $picture->getLens(),
			'aperture' => $picture->getAperture(),
			'exposure_time' => $picture->getExposureTime(),
			'size' => $picture->getWidth(). 'x' . $picture->getHeight() . 'px',
			'created_at' => $picture->getCreatedAt(),
			'uploaded_at'=> $picture->getUploadedAt(),
			'buy' => $loc_buy,
			'owner' => $user->getUsername(),
			'description' => $picture->getDescription(),
		], $translations));
	}
}