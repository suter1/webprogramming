<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 16:41
 */
class SessionHelper {
	public function is_logged_in(){
		return isset($_SESSION['user_id']);
	}

	public function logout(){
		session_destroy();
	}

	public function login($values){
		foreach ($values as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}
}