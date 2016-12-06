<?php

/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 06/12/16
 * Time: 22:03
 */
class PicturesController extends Controller{

	public function index(){
		$search = $this->params['search'];
		$pictures = Picture::where(['title' => $search]);
		$no_result = Localization::find_by(['qualifier' => 'no_result', 'lang' => get_language()])->getValue();
		load_template("views/pictures/index.php", [
			'search' => htmlspecialchars($search),
			'pictures' => $pictures,
			'no_result' => $no_result,
		]);
	}
}