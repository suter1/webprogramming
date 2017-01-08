<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 15/12/16
 * Time: 16:42
 */

class CheckoutController extends \Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$images = $this->getImages();

		$total = $this->getTotal();
		$basket_lang = Localization::find_by(['qualifier' => 'basket', 'lang' => get_language()])->getValue();
		$price_lang = Localization::find_by(['qualifier' => 'price', 'lang' => get_language()])->getValue();
		load_template("views/checkout/index.php", [
			'images' => $images,
			'basket' => $basket_lang,
			'total' => money_format('%.2n', $total),
			'price' => $price_lang]
		);
	}

	public function newly(){
		$total = $this->getTotal();
		$api = new PaypalApi();
		$api->prepare($total, $this->getImages());
	}

	private function getImages(){
		$images = [];
		$basket = $_SESSION['basket'];

		foreach(array_keys($basket) as $picture_id){
			$picture = Picture::find_by(['id' => $picture_id]);
			$images[$picture_id] = ['picture' => $picture,
				'pieces' => $basket[$picture_id] ];
		}

		return $images;
	}
	private function getTotal(){
		$basket = $_SESSION['basket'];
		$total = 0.00;
		foreach(array_keys($basket) as $picture_id){
			$picture = Picture::find_by(['id' => $picture_id]);
			$total += $picture->getPrice();
		}
		return $total;
	}
}