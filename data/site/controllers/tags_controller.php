<?php
require_once("autoload.php");

class TagsController extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['show', 'index'];
	}

	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$tag_id = $params[2];
		$tag = Tag::find_by(['id' => $tag_id]);
		$pictures = $tag->pictures();

		load_template("views/tags/show.php", [
			'pictures' => $pictures,
		]);
	}

	public function index(){
		// prevent direct access
		require_ajax();

		$tags = Tag::where(['name' => $this->params['term']]);
		$tag_list = [];
		foreach($tags as $tag){
			array_push($tag_list, ['label' => $tag->getName(), 'value' => $tag->getId()]);
		}
		echo json_encode($tag_list);
	}
}
