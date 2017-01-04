<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 15/12/16
 * Time: 16:42
 */
class CheckoutController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$basket = $_SESSION['basket'];
		$images = [];
		$total = 0.00;
		foreach(array_keys($basket) as $picture_id){
			$picture = Picture::find_by(['id' => $picture_id]);
			$images[$picture_id] = ['picture' => $picture,
				'pieces' => $basket[$picture_id] ];
			$total += $picture->getPrice();
		}
		$basket_lang = Localization::find_by(['qualifier' => 'basket', 'lang' => get_language()])->getValue();
		$price_lang = Localization::find_by(['qualifier' => 'price', 'lang' => get_language()])->getValue();
		load_template("views/checkout/index.php", [
			'images' => $images,
			'basket' => $basket_lang,
			'total' => money_format('%.2n', $total),
			'price' => $price_lang]
		);
	}

}