<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 00:19
 */
abstract class Controller {
	protected $params;

	public function __construct() {
		$this->parse_params();
	}

	/**
	 * @return array of methods that do not require login
	 */
	public function do_not_require_login(){
		return [];
	}

	public function show() {
		return "Not implemented";
	}

	public function index() {
		return "Not implemented";
	}

	public function edit() {
		return "Not implemented";
	}

	//NOTE new is a stupid keyword...
	public function newly() {
		return "Not implemented";
	}

	public function create() {
		return "Not implemented";
	}

	public function delete() {
		return "Not implemented";
	}

	public function update() {
		return "Not implemented";
	}

	/**
	 * adapted from http://stackoverflow.com/questions/2081894/handling-put-delete-arguments-in-php
	 */
	private function parse_params(){
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "PUT" || $method == "DELETE" || $method == "PATCH") {
			parse_str(file_get_contents('php://input'), $this->params);
//			var_dump($_SERVER["CONTENT_TYPE"]);
//			var_dump($this->params);
//			die();
			$GLOBALS["_{$method}"] = $this->params;
			$_REQUEST = $this->params + $_REQUEST;
		} else if ($method == "GET") {
			$this->params = $_GET;
		} else if ($method == "POST") {
			$this->params = $_POST;
		}
	}
}