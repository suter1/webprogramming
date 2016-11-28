<?php
require_once("autoload.php");

class ArticlesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function do_not_require_login() {
		return ['show'];
	}

	public function show(){
		$categories = ["nature", "shit", "crap"];

		$articles = "";
		foreach ($categories as $category) {

			$brs = "";
			for ($i = 1; $i <= 10; $i++) {
				$brs = "$brs<br />";
			}

			$articles = $articles . "<article class='article' id='" . $category . "'>" .
				"<h4>Header in Article in Section</h4>" .
				"<p>Absatz in Article einer Section</p>" .
				$brs .
				"</article>";
		}

		load_template("views/articles/show.php", ['articles' => $articles]) ;
	}
}
