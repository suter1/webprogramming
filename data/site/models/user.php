<?php

class User extends Model {
	private $id;
	private $first_name;
	private $last_name;
	private $email;
	private $address;
	private $sex;
	private $username;
	private $password_hash;
	private $email_confirmed = false;

	function __construct($values) {
		parent::__construct();
		$this->id = $values['id'];
		$this->first_name = $values['first_name'];
		$this->last_name = $values['last_name'];
		$this->email = $values['email'];
		$this->address = $values['address'];
		$this->sex = $values['sex'];
		$this->username = $values['username'];
		$this->password_hash = $values['password_hash'];
		$this->email_confirmed = $values['email_confirmed'];
	}

	static function getTableName() {
		return "users";
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
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return mixed
	 */
	public function getSex() {
		return $this->sex;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getPasswordHash() {
		return $this->password_hash;
	}

	protected function has_many() {
		return [
			"pictures" => [
				"class_name" => "Picture",
				"foreign_table" => "pictures",
				"foreign_key" => "owner_id",
			],
			"orders" => [
				"class_name" => "Order",
				"foreign_table" => "orders",
				"foreign_key" => "user_id",
			]
		];
	}

	protected function has_and_belongs_to_many() {
		return [];
	}

	static function getPrimaryKey() {
		return "id";
	}

	/**
	 * @return bool
	 */
	public function isEmailConfirmed() {
		return $this->email_confirmed;
	}

}