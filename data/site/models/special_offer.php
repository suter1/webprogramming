<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:13
 */
class Special_offer extends Model {
	private $id;
	private $start;
	private $end;

	function __construct($values)
	{
		$this->id=$values['id'];
		$this->start=$values['start'];
		$this->end=$values['end'];
	}

	static function getTableName()
	{
		return "special_offers";
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
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }


}