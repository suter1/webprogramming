<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 24/12/16
 * Time: 12:01
 */
class PurchaseMailer extends Mailer{
	private $receiver;
	private $template;

	function __construct($download_link, $receiver) {
		parent::__construct();
		$this->receiver = $receiver;
		$this->template = $this->load_mail_template("views/purchase_mailer.php", ['download_link' => $download_link]);
	}

	function send_mail(){
		return parent::send("Your purchase was successful", $this->template, $this->receiver);
	}

}