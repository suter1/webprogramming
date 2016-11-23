<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 01:59
 */

class ProfileController extends Controller{
	public function show(){
		load_template("views/profile/show.php", [
			'user' => current_user(),
			'pictures' => current_user()->pictures(),
		]);
	}
}