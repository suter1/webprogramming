<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 15/12/16
 * Time: 16:42
 */
class UserController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		//if current_user is admin....
		load_template("views/user/index.php", ['users' => User::all()]);
	}

	public function edit(){
		//if current_user is the user, or user is admin
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})\/edit/', $url, $matches);
		$id = $matches[0];
		$user = User::find_by(['id' => $id]);
		load_template("views/user/edit.php", [
			'first_name'	=> $user->getFirstName(),
			'last_name' 	=> $user->getLastName(),
			'is_admin'		=> $user->isAdmin(),
			'username'		=> $user->getUserName(),
			'email'			=> $user->getEmail(),
			'sex'			=> $user->getSex(),
			'id'			=> $user->getId(),
		]);
	}

	public function update(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		$user = User::find_by(['id' => $id]);
		$update_array = [
			'sex' => $this->params['sex'],
			'first_name' => $this->params['first_name'],
			'email' => $this->params['email'],
			'last_name' => $this->params['last_name']];

		if(current_user()->isAdmin()) array_merge(['is_admin' => $this->params['is_admin']]);
		$success = $user->update($update_array);
		http_response_code(($success) ? 200 : 500);
	}

	public function delete(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		if(current_user()->isAdmin() || current_user()->getId() === $id){
			User::find_by(['id' => $id])->delete();
		}
		http_response_code(200);
	}

}