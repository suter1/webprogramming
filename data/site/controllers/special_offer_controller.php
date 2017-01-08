<?php
require_once("autoload.php");

class SpecialOfferController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		load_template("views/special_offer/index.php", ['offers' => SpecialOffer::all()]);
	}

	public function newly() {
		$pictures = Picture::where(['deleted' => '0']);
		load_template("views/special_offer/new.php", ['pictures' => $pictures]);
	}

	public function create(){
		$start = date('d-M-Y H:i:s', strtotime($this->params['start']));
		$end = date('d-M-Y H:i:s', strtotime($this->params['end']));
		$pictures = $this->params['pictures'];

		$special_offer = SpecialOffer::create(['start' => $start, 'end' => $end]);
		foreach($pictures as $picture_id){
			OfferPicture::create(['picture_id' => $picture_id, 'offer_id' => $special_offer->getId()]);
		}
		parent::flash("Special offer created");
		redirect("/special_offer");
	}

	public function edit(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		load_template("views/special_offer/edit.php", [
			'offer' => SpecialOffer::find_by(['id' => $id]),
			'pictures' => Picture::where(['deleted' => '0'], null, null, null, null),
		]);
	}

	public function update(){
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		$offer = SpecialOffer::find_by(['id' => $id]);

		$start_date = DateTime::createFromFormat('d.m.Y H:i', $this->params['start']);
		$end_date = DateTime::createFromFormat('d.m.Y H:i', $this->params['end']);

		$pictures = $this->params['pictures'];

		OfferPicture::delete_all('offer_id = ' .$offer->getId());
		$offer->update([
			'start' => $start_date->format('Y-m-d H:i:s'),
			'end' => $end_date->format('Y-m-d H:i:s'),
		]);


		foreach($pictures as $picture_id){
			OfferPicture::create(['picture_id' => $picture_id, 'offer_id' => $offer->getId()]);
		}
		parent::flash("Special offer updated");
		http_response_code(200);
	}

	public function delete() {
		$url = $_SERVER['REQUEST_URI'];
		preg_match('/(\d{1,})/', $url, $matches);
		$id = $matches[0];
		$offer = SpecialOffer::find_by(['id' => $id]);
		OfferPicture::delete_all('offer_id = ' .$offer->getId());
		$offer->delete();
		http_response_code(200);
	}
}
