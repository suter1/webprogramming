<?php

/**
 * Created by PhpStorm.
 * User: fluht1
 */
class Localization extends Model {
	private $id;
	private $qualifier;
	private $value;
	private $lang;

	function __construct($values) {
		$this->id = $values['id'];
		$this->qualifier = $values['qualifier'];
		$this->value = $values['value'];
		$this->lang = $values['lang'];
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @return mixed
	 */
	public function getLang() {
		return $this->lang;
	}

	protected function has_and_belongs_to_many() {
		return [];
	}

	static function getTableName() {
		return "localizations";
	}

	protected function has_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}
}