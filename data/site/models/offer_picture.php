<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:17
 */
class OfferPicture extends Model {
	private $offer_id;
	private $picture_id;
	private $new_price;

	function __construct($values)
	{
		$this->offer_id=$values['offer_id'];
		$this->picture_id=$values['picture_id'];
		$this->new_price=$values['new_price'];
	}

	static function getTableName()
	{
		return "offers_pictures";
	}

    /**
     * @return mixed
     */
    public function getOfferId()
    {
        return $this->offer_id;
    }

    /**
     * @return mixed
     */
    public function getPictureId()
    {
        return $this->picture_id;
    }

    /**
     * @return mixed
     */
    public function getNewPrice()
    {
        return $this->new_price;
    }


    protected function has_and_belongs_to_many()
    {
        return [];
    }
}