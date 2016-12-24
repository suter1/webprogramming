<?php
require_once "autoload.php";

class RegistrationController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['create', 'index'];
	}

	public function index(){
		load_template("views/registration/index.php", []);
	}

	public function create(){
		$username = get_param("username", null, "POST");
		$email = get_param("email", null, "POST");
		$password = get_param("password", null, "POST");
		$password_confirm = get_param("password_confirm", null, "POST");

		if($password != $password_confirm){
			//TODO passwords do not match
			echo "fail";
			load_template("views/show.php", []);
			die();
		}
		$user = User::find_by(['username' => $username]);
		if(is_null($user) || !isset($user)) {
			$password_hash = password_hash($password, PASSWORD_DEFAULT);
			$created_user = User::create(['username' => $username, 'email' => $email, 'password_hash' => $password_hash]);
			$link = "www.google.ch";
			$mailer = new ConfirmMailer($link, $email);
			if($mailer->send_mail() != "1") {
				echo
				die();
			}
			redirect("mail_sent");
		}else {
			echo "username already taken";
			load_template("views/show.php", []);
			die();
			//TODO username already taken
		}
	}
}