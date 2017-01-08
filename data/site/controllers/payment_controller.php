<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 15/12/16
 * Time: 16:42
 */

class PaymentController extends \Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$approved = $this->params['approved'];
		if($approved === 'true' && isset($_SESSION['payment_hash'])){
			parent::flash("Payment successful");
			$order = Order::find_by(['hash' => $_SESSION['payment_hash'], 'payment_id' => $this->params['paymentId']]);
			$order->update(['complete' => '1']);

			unset($_SESSION['payment_hash']);

			foreach(array_keys($_SESSION['basket']) as $picture_id){
				/**
				 * @var $picture Picture
				 */
				$picture = Picture::find_by(['id' => $picture_id]);
				PictureOrder::create([
					'picture_id' => $picture_id,
					'order_id' => $order->getId(),
					'price' => $picture->getPrice(),
					'size' => 'all',
				]);
				/**
				 * @var owner User
				 */
				$owner = $picture->getOwner();
				$owners_budget = $owner->getBudget();
				$owner->update([
					'budget' => ($owners_budget + $picture->getPrice()*0.6)
				]);
			}

			$_SESSION['basket'] = [];

		}else{
			parent::flash("Payment could not be completed");
		}

		load_template("views/payment/index.php", []);
	}

}