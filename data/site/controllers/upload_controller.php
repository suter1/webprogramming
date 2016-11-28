<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 18.10.2016
 * Time: 19:47
 */

require_once "includes/image_functions.php";
require_once "autoload.php";

class UploadController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		if (($_FILES['upload'])) {
			$path = "gallery";
			$thumbnail_path = "gallery/thumbnails";
			$file = $_FILES['upload'];

			if ($file['error'] != 0) {
				echo "There was an error uploading the file \n";
				echo $file['error'];
				echo var_dump($file);
				exit;
			}
			$file_name = $_FILES['upload']['name'];
			$file_type = $_FILES['upload']['type'];
			$file_temp = ($_FILES['upload']['tmp_name']);
			$allowed = array('tif', 'tiff', 'jpg', 'jpeg', 'JPG');
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			if (!in_array($ext, $allowed)) {
				echo "This file type is not allowed to upload to this site.";
				exit;
			}

			do {
				$pick_file_name = md5(uniqid(rand())) . ".$ext";
				$composed_path = "$path/$pick_file_name";
			} while (file_exists(__DIR__ . "/$composed_path"));

			if (!move_uploaded_file($file_temp, $composed_path)) {
				echo "file could not be moved from $file_temp to $composed_path";
				exit;
			}

			$exif = @exif_read_data($composed_path);

			$e_camera_model = "n/a";
			if (array_key_exists('Model', $exif)) $e_camera_model = $exif['Model'];

			$e_file_name = $file_name;
			$e_width = $exif['COMPUTED']['Width'] . " pixel";
			$e_height = $exif['COMPUTED']['Height'] . " pixel";

			$e_lens = $e_date = $e_exposure_time = $e_aperture = "n/a";
			if (array_key_exists('ApertureFNumber', $exif)) $e_aperture = $exif['COMPUTED']['ApertureFNumber'];

			if (array_key_exists('ExposureTime', $exif)) $e_exposure_time = $exif['ExposureTime'] . " s";

			if (array_key_exists('DateTimeOriginal', $exif)) $e_date = $exif['DateTimeOriginal'];

			if (array_key_exists('UndefinedTag:0xA434', $exif)) $e_lens = $exif['UndefinedTag:0xA434'];

			$thumb_path = $thumbnail_path . "/" . basename($composed_path);

			$thumb_successful = resize_image($composed_path, $thumb_path);
			if (!$thumb_successful) die("could not create thumbnail file");
			$image = Picture::create([
				'camera_model' => $e_camera_model,
				'aperture' => $e_aperture,
				'exposure_time' => $e_exposure_time,
				'created_at' => $e_date,
				'uploaded_at' => date('Y-m-d H:i:s'),
				'path' => $composed_path,
				'thumbnail_path' => $thumb_path,
				'owner_id' => current_user()->getId(),
				'width' => $e_width,
				'height' => $e_height,
				'title' => '',
				'id' => null]);

			$id = $image->getId();
			redirect("/upload/$id/edit");
		} else
			load_template("views/upload/show.php", []);
	}

	/**
	 * TODO authorize if admin or owner == current user
	 */
	public function edit(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})\/edit/', $url, $matches);
		$id = $matches[0];
		$image = Picture::find_by(['id' => $id]);
		load_template("views/upload/edit.php", [
			'camera_model' 		=> $image->getCameraModel(),
			'aperture'			=> $image->getAperture(),
			'exposure_time'		=> $image->getExposureTime(),
			'title'				=> $image->getTitle(),
			'thumbnail_path'	=> $image->getThumbnailPath(),
			'id'				=> $image->getId(),
		]);
	}

	/**
	 *
	 */
	public function update(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		echo "ok";
		$id = $matches[0];
		// TODO $id should be there already somehow, or easy available by method call
		$camera_model = $this->params['camera_model'];
		$aperture = $this->params['aperture'];
		$exposure_time = $this->params['exposure_time'];
		$title = $this->params['title'];
		var_dump($this->params);
		$image = Picture::find_by(['id' => $id]);
		$res = $image->update(['camera_model' => $camera_model, 'aperture' => $aperture, 'exposure_time' => $exposure_time, 'title' => $title]);
		if(!$res) header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

	}

	public function index(){
		load_template("views/upload/index.php", []);
	}
}