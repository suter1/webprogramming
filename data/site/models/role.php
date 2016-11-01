<?php
class Role extends Model {
    private $name;

    function __construct($values){
        $this->name = $values['name'];
    }

    static function getTableName(){
        return "roles";
    }
}