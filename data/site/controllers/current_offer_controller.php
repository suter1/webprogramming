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
		$offers = SpecialOffer::all();
		$offer = null;
		$current_time = date('Y-m-d H:i:s');
		foreach($offers as $of){
			if($of->getStart() < $current_time && $of->getEnd() > $current_time){
				$offer = $of;
				break;
			}
		}
		load_template("views/current_offer/index.php", ['offer' => $offer]);
	}
}
