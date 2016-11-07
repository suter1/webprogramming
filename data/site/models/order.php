<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:05
 */
class Order extends Model {
	private $id;
	private $order_date;
	private $user_id;
	private $price;

	function __construct($values)
	{
		$this->id=$values['id'];
		$this->order_date=$values['order_date'];
		$this->user_id=$values['user_id'];
		$this->price=$values['price'];
	}

	static function getTableName()
	{
		return "orders";
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
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