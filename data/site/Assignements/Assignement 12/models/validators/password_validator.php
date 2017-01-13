<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 15.11.2016
 * Time: 20:15
 */
require_once 'autoload.php';

class PasswordValidator extends Validator
{
	private $password;
	private $confirmation;
	const regex = '/^[A-Za-z0-9]{8,250}$/';

//	const regex = '/\S+@\S+\.\S+/';

	function __construct($password, $confirmation)
	{
		$this->password = $password;
		$this->confirmation = $confirmation;
	}

	public function isValid()
	{
		return preg_match(self::regex, $this->password) === 1 && strcmp($this->password, $this->confirmation) === 0;
	}
}