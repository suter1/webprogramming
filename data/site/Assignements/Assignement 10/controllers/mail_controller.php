<?php
require_once("autoload.php");

class MailController extends Controller{

	public function __construct() {
		parent::__construct();
	}

	public function show(){
		load_template("views/mail/show.php");
	}
}
