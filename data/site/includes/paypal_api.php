<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 07/01/17
 * Time: 22:46
 */
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../models/order.php";
class PaypalApi {

	private $context;
	private $payer;
	private $details;
	private $amount;
	private $transaction;
	private $payment;
	private $redirectUrls;
	private $itemList;

	function __construct() {

		//API
		$this->context = new \PayPal\Rest\ApiContext(
			new \PayPal\Auth\OAuthTokenCredential(
				'AU6pgYijCL4GJP4NBKwrFa2ikgDTW11AUXMNPbwmGoXJzjDZjQfAAJHlP8lvMM0PK6NLFfwBddps4yxo',     // ClientID
				'EFAbHT9-TXdvxSk2WYH6iwan3DEv_VpWkUAu-zXehm9TEHkXgTXyld8cl9Iibyzss74eWAW18mIZ-iOc'      // ClientSecret
			)
		);

		$this->context->setConfig([
			'mode' => 'sandbox',
			'http.ConnectionTimeOut' => '30',
			'validation.level' => 'log',
			'log.LogLevel' => 'FINE',
			'log.FileName' => '',
			'log.LogEnabled' => 'false',
		]);

		$this->payer = new \PayPal\Api\Payer();
		$this->payer->setPaymentMethod('paypal');

		$this->details = new \PayPal\Api\Details();
		$this->details->setTax('0.00');
		$this->details->setShipping('0.00');
		$this->details->setSubtotal('0.00');

		$this->amount = new \PayPal\Api\Amount();
		$this->amount->setCurrency('CHF');
		$this->transaction = new \PayPal\Api\Transaction();
		$this->payment = new PayPal\Api\Payment();
		$this->redirectUrls = new PayPal\Api\RedirectUrls();
		$this->itemList = new \PayPal\Api\ItemList();
	}

	function prepare($total, $pictures){
		$items = [];
		foreach($pictures as $pic){
			$picture = $pic['picture'];
			$item = new \PayPal\Api\Item();
			$item->setName($picture->getTitle());
			$item->setCurrency("CHF");
			$item->setQuantity(1);
			$item->setPrice($picture->getPrice() * $_SESSION['basket'][$picture->getId()]['size']);
			$item->setSku($picture->getId());
			array_push($items, $item);
		}
		$this->details->setSubtotal($total);
		$this->itemList->setItems($items);

		$this->amount->setTotal($total);
		$this->amount->setDetails($this->details);
		$this->transaction->setAmount($this->amount);
		$this->transaction->setDescription('Pictures');
		$this->transaction->setItemList($this->itemList);
		$this->transaction->setInvoiceNumber(uniqid());

		$this->payment->setIntent('sale');
		$this->payment->setPayer($this->payer);
		$this->payment->setTransactions([$this->transaction]);
		$method = (isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"] === 'on') ? "https" : "http";
		$url = "$method://" . getenv('HTTP_HOST') ;
		$this->redirectUrls->setReturnUrl( $url . "/payment?approved=true");
		$this->redirectUrls->setCancelUrl( $url . "/payment?approved=false");

		$this->payment->setRedirectUrls($this->redirectUrls);
		try{
			$this->payment->create($this->context);
			$hash = md5($this->payment->getId());
			Order::create([
				'hash' => $hash,
				'payment_id' => $this->payment->getId(),
				'user_id' => current_user()->getId(),
				'price' => $total,
				'order_date' => date('Y-m-d H:i:s', time()),
				'complete' => 'f'
			]);
			$_SESSION['payment_hash'] = $hash;
		}catch(\PayPal\Exception\PayPalConnectionException $e){
			die($e->getData());
			redirect('/home?message=Fail');
		}

		redirect($this->payment->getApprovalLink());

	}
}