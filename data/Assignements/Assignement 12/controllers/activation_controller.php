<?php
require_once("autoload.php");

class ActivationController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['show'];
	}

	/**
	 * Show refers to HTTP GET -> Reason to choose show
	 * The Email was sent to the customer and he will activate the account
	 */
	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$user_id = $params[2];
		$user = User::find_by(['id' => $user_id]);
		if(is_null($user_id) || !isset($user_id) || is_null($user)){
			$message = "Your activation link is wrong";
		}else{
			$user->update(['email_confirmed' => true]);
			$message = "You have successfully activated your account, log in now!";
		}
		load_template("views/activation/show.php", ['message' => $message]);
	}
}
