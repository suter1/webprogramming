<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 06/12/16
 * Time: 19:04
 */
require_once("autoload.php");

class PurchaseController extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return [];
	}

	public function index(){
		$images = [];
		foreach($this->basket() as $image_id){
			array_push($images, Picture::find_by(['id' => $image_id]));
		}
		load_template("views/purchase/index.php", ['images' => $images]);
	}

	public function create(){
		$this->basket();
		$image_id = $this->params['picture_id'];
		if(isset($image_id) && $image_id != "") array_push($_SESSION['basket'], $image_id);
		http_response_code(200);
	}

	public function delete(){
		$image_id = $this->params['picture_id'];
		$offset = array_search($image_id, $_SESSION['basket']);
		array_splice($_SESSION['basket'], $offset);
		http_response_code(200);
	}

	/**
	 * @return mixed
	 */
	private function basket(){
		if(!isset($_SESSION['basket'])) $_SESSION['basket'] = [];
		return $_SESSION['basket'];
	}
}