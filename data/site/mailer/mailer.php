<?php
require_once(__DIR__ . '/../swiftmailer/lib/swift_required.php');
require_once(__DIR__ . '/../swiftmailer/lib/swift_init.php');

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 24/12/16
 * Time: 12:01
 */
abstract class Mailer {
	private $transport;
	private $mailer;
	protected $message;
	protected static $from = "isithombee@gmail.com";
	protected static $from_alias = "isithombe";

	function __construct() {
		$this->transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
			->setUsername('isithombee')
			->setPassword('Isithombe_2016');

		$this->mailer = Swift_Mailer::newInstance($this->transport);
	}

	protected function send($subject = "", $body = "", $receiver = ""){
		$this->message = Swift_Message::newInstance($subject)
			->setFrom(array(static::$from => static::$from_alias))
			->setTo(array($receiver))
			->setBody($body);
		return $this->mailer->send($this->message);
	}

	protected function load_mail_template($template, array $options = []){

		 $template = include($template);
		 echo $template;
		 return $template;
	}

	abstract function send_mail();

}