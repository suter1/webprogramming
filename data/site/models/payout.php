<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:14
 */
class Payout extends Model {
	private $id;
	private $execution;
	private $user_id;
	private $total_payout;
	private $state;

	function __construct($values)
	{
		$this->id=$values('id');
		$this->execution=$values('execution');
		$this->user_id=$values('user_id');
		$this->total_payout=$values('total_payout');
		$this->state=$values('state');
	}

	static function getTableName()
	{
		return "payouts";
	}
}