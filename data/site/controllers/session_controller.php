<?php
require_once "autoload.php";
class SessionController extends Controller {
	private $session_helper;

	public function __construct() {
		parent::__construct();
		$this->session_helper = new SessionHelper();
	}

	public function do_not_require_login() {
		return ['create'];
	}

	public function create(){
		$password = $this->params['password'];
		$username = $this->params['username'];

		$user = User::find_by(['username' => $username]);
		//TODO add a message that it didn't work
		if(is_null($user) || !$user->isEmailConfirmed()){
			parent::flash("User does not exist, password is wrong or email is not confirmed.");
			redirect("/home");
		}
		if ( $out = password_verify($password, $user->getPasswordHash()) ) {
			$this->session_helper->login(['user_id' => $user->getId(), 'logged_in' => true]);
		} else {
			parent::flash("User does not exist, password is wrong or email is not confirmed.");
		}
		redirect("/home");
	}

	public function delete(){
		$this->session_helper->logout();
		redirect('/home');
	}
}

