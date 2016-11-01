<?php
require_once("db/connection.php");
require_once("models/model_structure.php");
abstract class Model implements ModelStructure {

    /**
     * ['key' => 'value', 'key' => 'value']
     * @param search_array
     * @return Model result
     */
    public static function find_by($search_array){
        $where = "";
        $index = 0;
        foreach($search_array as $key => $value){
            $where .= "$key= '$value'";
            if(++$index < sizeof($search_array)) $where .= ", ";
        }
        $db = new Database();
        $db->connect();
        $result = $db->select(static::getTableName(), '*', null, $where, null, 1);
        $db->disconnect();

        if(sizeof($result) == 0) return null;
        $class = "Class".static::getTableName();
        return new $class($result[0]); //use the first one, because this method is built just to return the first
    }

    /**
     * @param $insert_array
     * @return String
     */
    public static function create($insert_array){
        $db = new Database();
        $db->connect();
        $result = $db->insert(static::getTableName(), $insert_array);
        $db->disconnect();
        return $result;
    }

    /**
     * @return Model Array
     */
    public static function all(){
        $db = new Database();
        $db->connect();
        $result = $db->select(static::getTableName());
        $db->disconnect();
        $models = [];
        $class = "Class".self::getTableName();
        foreach($result as $result_set){
            array_push($models, new $class($result_set));
        }
        return $models;
    }

    /**
     * @param $update_array
     * @return Boolean if worked or not
     */
    public function update($update_array){

    }

    public static function first($limit = 1){

    }

    public static function last($limit = 1){

    }
}