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
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


}