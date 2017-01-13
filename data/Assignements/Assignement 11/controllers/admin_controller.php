<?php
require_once("autoload.php");

class AdminController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		if(current_user()->isAdmin())
			load_template("views/admin/index.php", []);
		else{
			redirect("/home");
		}
	}
}
