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
}