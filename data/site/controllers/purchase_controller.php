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

	public function index(){
		$images = [];
		foreach(array_keys($this->basket()) as $picture_id){
			$images[$picture_id] = ['picture' => Picture::find_by(['id' => $picture_id]),
				'pieces' => $this->basket()[$picture_id] ];
		}
		load_template("views/purchase/index.php", ['images' => $images, 'price' => $this->price()]);
	}

	/**
	 * creates a hash in the following structure in the session
	 *
	 * ['basket']['<picture_id>' => '<number of pieces>']
	 */
	public function create(){
		$this->basket();
		$picture_id = $this->params['picture_id'];
		if(isset($picture_id) && $picture_id != "") {
			if(!isset($_SESSION['basket'][$picture_id])) $_SESSION['basket'][$picture_id] = 0;
			$_SESSION['basket'][$picture_id] = 1; // can easily be changed to += 1 in case of multiple purchases possible
		}
		http_response_code(200);
	}

	public function delete(){
		$picture_id = $this->params['picture_id'];
		$offset = array_search($picture_id, $_SESSION['basket']);
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

	private function price(){
		$price = 0;
		foreach(array_keys($this->basket()) as $picture_id){
			$img = Picture::find_by(['id' => $picture_id]);
			$price += $img->getPrice() * $this->basket()[$picture_id];
		}
		return $price;
	}
}