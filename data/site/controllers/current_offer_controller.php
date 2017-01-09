<?php
require_once("autoload.php");

class CurrentOfferController extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['index'];
	}

	public function index(){
		// prevent direct access
		require_ajax();
		$offer = SpecialOffer::getCurrent();
		load_template("views/current_offer/index.php", ['offer' => $offer]);
	}
}
