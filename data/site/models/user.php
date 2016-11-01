<?php
class User extends Model {
	private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $address;
    private $sex;
    private $username;

    function __construct($values){
    	$this->id=$values('id');
        $this->first_name = $values['first_name'];
        $this->last_name = $values['last_name'];
        $this->email = $values['email'];
        $this->address = $values['address'];
        $this->sex = $values['sex'];
        $this->username = $values['username'];

    }

    static function getTableName() {
        return "users";
    }
}