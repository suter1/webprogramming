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
		if(is_null($user) || !$user->isEmailConfirmed() || $user->isDeleted()){
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'login_error'])->getValue());
			redirect("/home");
		}
		if ( $out = password_verify($password, $user->getPasswordHash()) ) {
			$this->session_helper->login(['user_id' => $user->getId(), 'logged_in' => true]);
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'login_successful'])->getValue());
		} else {
			parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'login_error'])->getValue());
		}
		redirect("/home");
	}

	public function delete(){
		parent::flash(Localization::find_by(['lang' => get_language(), 'qualifier' => 'logout_successful'])->getValue());
		$this->session_helper->logout();
		redirect('/home');
	}
}

