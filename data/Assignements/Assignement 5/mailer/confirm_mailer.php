<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 24/12/16
 * Time: 12:01
 */
class ConfirmMailer extends Mailer{
	private $receiver;
	private $template;

	function __construct($activation_link, $receiver) {
		parent::__construct();
		$this->receiver = $receiver;
		$this->template = $this->load_mail_template("views/confirm_mailer.php", ['activation_link' => $activation_link]);
	}

	function send_mail(){
		return parent::send("Activate your Account", $this->template, $this->receiver);
	}

}