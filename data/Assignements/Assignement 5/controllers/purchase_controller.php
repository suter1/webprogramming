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
				'pieces' => $this->basket()[$picture_id]['amount'],
				'size' => $this->basket()[$picture_id]['size'],
 			];
		}
		$translations = [];
		foreach (['checkout'] as $translate) {
			$translations["lang_$translate"] = Localization::find_by(['lang' => get_language(), 'qualifier' => $translate])->getValue();
		}
		load_template("views/purchase/index.php", array_merge([
			'images' => $images, 'price' => $this->price()
		], $translations));
	}

	/**
	 * creates a hash in the following structure in the session
	 *
	 * ['basket']['<picture_id>' => '<number of pieces>']
	 */
	public function create(){
		$this->basket();
		$picture_id = $this->params['picture_id'];
		$size = $this->params['size'];
		echo $size;
		if(!isset($size) || ($size !== '1' && $size !== '0.5')) $size = '1';
		if(isset($picture_id) && $picture_id != "") {
			if(!isset($_SESSION['basket'][$picture_id])) $_SESSION['basket'][$picture_id] = ['size' => 1, 'amount' => 0];
			$_SESSION['basket'][$picture_id]['amount'] = 1; // can easily be changed to += 1 in case of multiple purchases possible
			$_SESSION['basket'][$picture_id]['size'] = $size;
		}
		http_response_code(200);
	}

	public function delete(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$picture_id = $matches[0];
		unset($_SESSION['basket'][$picture_id]);
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
			$price += $img->getPrice() * $this->basket()[$picture_id]['amount'] * $this->basket()[$picture_id]['size'];
		}
		return money_format('%.2n CHF', $price);
	}
}