<?php
require_once("autoload.php");

class TagsController extends Controller{
	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$tag_id = $params[2];


		$tag = Tag::find_by(['id' => $tag_id]);
		$pictures = $tag->pictures();

		load_template("views/tags_controller.php", [
			'pictures' => $pictures,
		]);
	}
}
