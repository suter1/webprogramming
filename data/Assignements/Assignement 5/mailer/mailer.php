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
	protected static $from = "isithombee@gmail.com";
	protected static $from_alias = "isithombe";

	function __construct() {
		$this->transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
			->setUsername('isithombee')
			->setPassword('Isithombe_2016');

		$this->mailer = Swift_Mailer::newInstance($this->transport);
	}

	protected function send($subject = "", $body = "", $receiver = ""){
		$message = Swift_Message::newInstance($subject)
			->setFrom(array(static::$from => static::$from_alias))
			->setTo(array($receiver))
			->setBody($body)
			->setContentType('text/html');
		return $this->mailer->send($message);
	}

	protected function load_mail_template($template_path, array $options = []){
		$template = file_get_contents(__DIR__ . "/" . $template_path);
		foreach($options as $key => $value){
			$regex = '/<%\s*\'' . $key . '\'\s*%>/i';
			$template = preg_replace($regex, $value, $template);
		}
		return $template;
	}

	abstract function send_mail();

}