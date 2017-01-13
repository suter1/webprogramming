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
	private $is_admin = false;
	private $budget;
	private $email_confirmed = false;
	private $deleted = false;

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
		$this->budget = $values['budget'];
		$this->email_confirmed = $values['email_confirmed'];
		$this->is_admin = $values['is_admin'];
		$this->deleted = $values['deleted'];
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

	protected function has_and_belongs_to_many(){
		return ["roles" => [
			"class_name" => "Role",
			"join_table" => "roles_users",
			"foreign_key" => "user_id",
			"association_key" => "role_id"]
		];
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

	static function getPrimaryKey() {
		return "id";
	}

	/**
	 * @return bool
	 */
	public function isEmailConfirmed() {
		return $this->email_confirmed;
	}

	/**
	 * @return mixed
	 */
	public function isAdmin() {
		return $this->is_admin;
	}

	/**
	 * @param mixed $is_admin
	 */
	public function setAdmin($is_admin) {
		$this->is_admin = $is_admin;
	}

	/**
	 * @return mixed
	 */
	public function getBudget() {
		return $this->budget;
	}

	public function isDeleted(){
		return $this->deleted;
	}

	/**
	 * @param mixed $budget
	 */
	public function setBudget($budget) {
		$this->budget = $budget;
	}
}