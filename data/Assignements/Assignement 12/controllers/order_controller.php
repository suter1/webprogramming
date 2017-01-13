<?php
require_once("autoload.php");

class OrderController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$order_id = $params[2];
		$order = Order::find_by(['id' => $order_id]);

		if(isset($this->params['download']) && isset($order) && $order->isComplete()){
			$pictures = [];
			foreach($order->pictures_orders() as $po){
				array_push($pictures, $po->getPicture());
			}
			load_template("views/order/download.php", ['pictures' => $pictures]);
		}else{
			redirect("/home");
		}
	}
}
