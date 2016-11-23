<?php
require_once "autoload.php";

class SessionController extends Controller {
	public function create(){
		$password = get_param('password', null, 'POST');
		$username = get_param('username', null, 'POST');

		$user = User::find_by(['username' => $username]);
		if($user === null) redirect("/home");
		if ( $out = password_verify($password, $user->getPasswordHash()) ) {
			$_SESSION['user_id'] = $user->getId();
			$_SESSION['logged_in'] = true;
		} else {
			//probably do something later
		}
		redirect("/home");
	}

	public function delete(){
		session_destroy();
		redirect('/home');
	}
}

