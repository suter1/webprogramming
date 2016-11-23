<?php
class HomeController extends Controller{
	public function show(){
		$pictures = Picture::last(10);

		load_template('views/home/show.php', [
			'pictures' => $pictures,
		]);
	}
}
