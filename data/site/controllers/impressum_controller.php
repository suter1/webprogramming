<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 09/01/17
 * Time: 01:55
 */
class ImpressumController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['index'];
	}

	public function index(){
		$template = (get_language() === "de") ? "views/impressum/de.php" : "views/impressum/en.php";
		load_template($template);
	}
}