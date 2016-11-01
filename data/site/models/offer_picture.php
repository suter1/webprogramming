<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:17
 */
class Offer_picture extends Model {
	private $offer_id;
	private $picture_id;
	private $new_price;

	function __construct($values)
	{
		$this->offer_id=$values('offer_id');
		$this->picture_id=$values('picture_id');
		$this->new_price=$values('new_price');
	}

	static function getTableName()
	{
		return "offers_pictures";
	}
}