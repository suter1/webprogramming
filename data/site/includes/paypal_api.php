<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 07/01/17
 * Time: 22:46
 */
require_once __DIR__ . "/../vendor/autoload.php";
class PaypalApi {

	private $context;
	private $payer;
	private $details;
	private $amount;
	private $transaction;
	private $payment;
	private $redirectUrls;

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

	}

	function prepare($total){
		$this->amount->setTotal($total);
		$this->amount->setDetails($this->details);
		$this->transaction->setAmount($this->amount);
		$this->transaction->setDescription('Pictures');

		$this->payment->setIntent('SALE');
		$this->payment->setPayer($this->payer);
		$this->payment->setTransactions([$this->transaction]);
		$this->redirectUrls->setReturnUrl("http://localhost:8080/payments?approved=true");
		$this->redirectUrls->setCancelUrl("http://localhost:8080/payments?approved=false");

		$this->payment->setRedirectUrls($this->redirectUrls);
		try{
			$this->payment->create($this->context);
		}catch(\PayPal\Exception\PayPalConnectionException $e){
			redirect('/home');
		}

		foreach($this->payment->getLinks() as $link) {
			if($link->getRel() === 'approval_url'){
				redirect($link->getHref());
			}
		}

	}
}