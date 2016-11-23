<?php
require_once("autoload.php");

class HomeController extends Controller{

	public function do_not_require_login() {
		return ['show'];
	}

	public function show(){
		$pictures = Picture::last(10);

		load_template('views/home/show.php', [
			'pictures' => $pictures,
		]);
	}
}
