<?php
require_once("autoload.php");

class HomeController extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['index'];
	}

	public function index(){
		$pictures = Picture::where(['deleted' => '0'], null, null, null, 10);

		load_template('views/home/index.php', [
			'pictures' => $pictures,
		]);
	}
}
