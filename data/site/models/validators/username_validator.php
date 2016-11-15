<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 15.11.2016
 * Time: 20:15
 */
require_once 'autoload.php';
class UsernameValidator extends Validator{
	private $username;
	const regex = '/^[A-Za-z0-9]{4,50}$/';
//	const regex = '/\S+@\S+\.\S+/';

	function __construct($username)
	{
		$this->username = $username;
	}

	public function isValid()
	{
		return preg_match(self::regex, $this->username) === 1;
	}
}