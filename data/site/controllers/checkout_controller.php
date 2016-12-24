<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 15/12/16
 * Time: 16:42
 */
class CheckoutController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$_SESSION['basket'];
		load_template("views/checkout/index.php", []);
	}

}