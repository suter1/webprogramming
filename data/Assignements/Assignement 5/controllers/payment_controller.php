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
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'payment_successful'])->getValue());
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
			$method = (isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"] === 'on') ? "https" : "http";
			$url = "$method://" . getenv('HTTP_HOST') ;
			$download_link = $url . "/order/" . $order->getId() ."?download";
			$mailer = new PurchaseMailer($download_link, current_user()->getEmail());
			try{
				if($mailer->send_mail() != "1") throw new Exception();
			}catch(Exception $e){
				parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'nomail_payok'])->getValue());
			}
			$_SESSION['basket'] = [];
			load_template("views/payment/index.php", ['order_id' => $order->getId(), 'download_link' => $download_link]);
		}else{
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'no_payment'])->getValue());
			load_template("views/payment/index.php", []);
		}
	}
}