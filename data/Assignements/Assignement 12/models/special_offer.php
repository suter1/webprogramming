<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 01.11.2016
 * Time: 21:13
 */
class SpecialOffer extends Model {
	private $id;
	private $start;
	private $end;

	function __construct($values){
		parent::__construct();
		$this->id=$values['id'];
		$this->start=$values['start'];
		$this->end=$values['end'];
	}

	static function getTableName(){
		return "special_offers";
	}

	static function getCurrent(){
		$offers = SpecialOffer::all();
		$offer = null;
		$current_time = date('Y-m-d H:i:s');
		foreach($offers as $of){
			if($of->getStart() < $current_time && $of->getEnd() > $current_time){
				$offer = $of;
				break;
			}
		}
		return $offer;
	}

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStart(){
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEnd(){
        return $this->end;
    }

    protected function has_and_belongs_to_many(){
		return ["pictures" => [
			"class_name" => "Picture",
			"join_table" => "offers_pictures",
			"foreign_key" => "offer_id",
			"association_key" => "picture_id"]
		];
    }

	protected function has_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}
}