<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:11
 */
class Rating extends Model {
	private $picture_id;
	private $user_id;
	private $value;

	function __construct($values)
	{
		$this->picture_id=$values['picture_id'];
		$this->user_id=$values['user_id'];
		$this->value=$values['value'];
	}

	static function getTableName()
	{
		return "ratings";
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


    protected function has_and_belongs_to_many()
    {
        return [];
    }

	protected function has_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}
}