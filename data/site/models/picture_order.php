<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:07
 */
class PictureOrder extends Model {
	private $picture_id;
	private $order_id;
	private $size;
	private $price;

	function __construct($values)
	{
		$this->picture_id=$values['picture_id'];
		$this->order_id=$values['order_id'];
		$this->size=$values['size'];
		$this->price=$values['price'];
	}

	static function getTableName()
	{
		return "pictures_orders";
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
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


    protected function has_and_belongs_to_many()
    {
        return [];
    }
}