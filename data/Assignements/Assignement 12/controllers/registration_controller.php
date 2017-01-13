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
		$username = $this->params['username'];
		$email = $this->params['email'];
		$password = $this->params['password'];
		$password_confirm = $this->params['password_confirm'];

		if($password != $password_confirm){
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'wrong_password'])->getValue());
			load_template("views/registration/index.php", []);
			return;
		}
		$user = User::find_by(['username' => $username]);
		if(is_null($user) || !isset($user)) {
			$password_hash = password_hash($password, PASSWORD_DEFAULT);
			$created_user = User::create(['username' => $username, 'email' => $email, 'password_hash' => $password_hash]);
			$link = getenv('HTTP_HOST') . "/activation/" . $created_user->getId();
			$mailer = new ConfirmMailer($link, $email);
			try{
				if($mailer->send_mail() != "1") throw new Exception();
			}catch(Exception $e){
				parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'mail_notsent'])->getValue());
				load_template("views/registration/index.php", []);
				return;
			}
			redirect("mail_sent");
		}else {
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'double_username'])->getValue());
			load_template("views/registration/index.php", []);
			return;
		}
	}
}