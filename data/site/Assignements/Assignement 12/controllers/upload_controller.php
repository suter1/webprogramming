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
				parent::flash("Error while file upload " . $file['error']);
				load_template("views/upload/newly.php", []);
				return;
			}
			$file_name = $_FILES['upload']['name'];
			$file_type = $_FILES['upload']['type'];
			$file_temp = ($_FILES['upload']['tmp_name']);
			$allowed = array('gif', 'GIF', 'jpg', 'jpeg', 'JPG', 'png', 'PNG');
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			if (!in_array($ext, $allowed)) {
				parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'type_notallowed'])->getValue().$ext);
				load_template("views/upload/newly.php", []);
				return;
			}

			do {
				$pick_file_name = md5(uniqid(rand())) . ".$ext";
				$composed_path = "$path/$pick_file_name";
			} while (file_exists(__DIR__ . "/$composed_path"));

			if (!move_uploaded_file($file_temp, $composed_path)) {
				parent::flash("file could not be moved from $file_temp to $composed_path");
				load_template("views/upload/newly.php", []);
				return;
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
			$bool = watermark($thumb_path);

			if (!$thumb_successful){
				parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'no_thumbnail'])->getValue());
				load_template("views/upload/newly.php", []);
				return;
			}
			$image = Picture::create([
				'camera_model' => $e_camera_model,
				'aperture' => $e_aperture,
				'lens' => $e_lens,
				'exposure_time' => $e_exposure_time,
				'created_at' => $e_date,
				'uploaded_at' => date('Y-m-d H:i:s'),
				'path' => $composed_path,
				'thumbnail_path' => $thumb_path,
				'owner_id' => current_user()->getId(),
				'width' => $e_width,
				'height' => $e_height,
				'title' => '',
				'description' => '',
				'id' => null]);

			$id = $image->getId();
			redirect("/upload/$id/edit");
		} else {
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'select_file'])->getValue());
			load_template("views/upload/show.php", []);
		}
	}

	/**
	 * TODO authorize if admin or owner == current user
	 */
	public function edit() {
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})\/edit/', $url, $matches);
		$id = $matches[0];
		/**
		 * @var $image Picture
		 */
		$image = Picture::find_by(['id' => $id]);
		$translations = [];
		foreach (['camera_model', 'description', 'lens', 'created_at', 'aperture', 'title', 'price', 'exposure_time'] as $translate) {
			$translations["lang_$translate"] = Localization::find_by(['lang' => get_language(), 'qualifier' => $translate])->getValue();
		}
		$tags = "";
		foreach ($image->tags() as $tag) {
			$tags .= $tag->getName() . ",";
		}
		load_template("views/upload/edit.php", array_merge([
			'title' => $image->getTitle(),
			'camera_model' => $image->getCameraModel(),
			'lens' => $image->getLens(),
			'aperture' => $image->getAperture(),
			'exposure_time' => $image->getExposureTime(),
			'created_at' => $image->getCreatedAt(),
			'price' => $image->getPrice(),
			'description' => $image->getDescription(),
			'id' => $image->getId(),
			'thumbnail_path' => $image->getThumbnailPath(),
			'tags' => $tags,
		], $translations));
	}

	/**
	 *
	 */
	public function update() {
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		$image = Picture::find_by(['id' => $id]);
		if ($this->params['price'] < 1){
			$this->params['price'] = 1;
		}
		$res = $image->update([
			'title' => $this->params['title'],
			'camera_model' => $this->params['camera_model'],
			'lens' => $this->params['lens'],
			'aperture' => $this->params['aperture'],
			'exposure_time' => $this->params['exposure_time'],
			'created_at' => $this->params['created_at'],
			'price' => $this->params['price'],
			'description' => $this->params['description'],
		]);

		PicturesTags::delete_all("picture_id = $id");
		foreach (explode(",", $this->params['tags']) as $tag_name) {
			$tag = Tag::find_or_create_by(['name' => $tag_name]);
			PicturesTags::create(['picture_id' => $id, 'tag_id' => $tag->getId()]);
		}
		if (!$res) header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
	}

	public function newly() {
		$lang = get_language();
		$copyright = Localization::find_by(['qualifier' => 'copyright', 'lang' => $lang])->getValue();
		load_template("views/upload/newly.php", ['copyright' => $copyright]);
	}
}