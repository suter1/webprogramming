<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 00:19
 */
abstract class Controller {

	/**
	 * @return array of methods that do not require login
	 */
	public function do_not_require_login(){
		return [];
	}

	public function show() {
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
}