<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 01:59
 */

class ProfileController extends Controller{
	public function show(){
		$my_pictures = Localization::find_by(["qualifier" => "my_pictures", 'lang' => 'de'])->getValue();
		$no_pictures = Localization::find_by(['qualifier' => 'no_pictures', 'lang' => 'de'])->getValue();
		$no_orders = Localization::find_by(["qualifier" => "no_orders", 'lang' => 'de'])->getValue();
		$my_orders = Localization::find_by(["qualifier" => "my_orders", 'lang' => 'de'])->getValue();
		$upload = Localization::find_by(["qualifier" => "upload", 'lang' => 'de'])->getValue();
		load_template("views/profile/show.php", [
			'user' => current_user(),
			'pictures' => current_user()->pictures(),
			'orders' => current_user()->orders(),
			'no_pictures' => $no_pictures,
			'my_pictures' => $my_pictures,
			'no_orders' => $no_orders,
			'my_orders' => $my_orders,
			'upload' => $upload,
		]);
	}
}