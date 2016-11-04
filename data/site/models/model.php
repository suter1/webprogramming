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
        return static::initModel($result[0]); //use the first one, because this method is built just to return the first
    }

    /**
     * @param $insert_array
     * @return Model instance
     */
    public static function create($insert_array){
        $db = new Database();
        $db->connect();
        $result = $db->insert(static::getTableName(), $insert_array);
        $db->disconnect();
        return static::initModel($result);
    }

    /**
     * @return Model Array
     */
    public static function all(){
        $db = new Database();
        $db->connect();
        $result = $db->select(static::getTableName());
        $db->disconnect();
        return static::initModels($result);
    }

    /**
     * @param $update_hash ('column' => 'value')
     * @return Boolean if worked or not
     */
    public function update($update_hash){
        $db = new Database();
        $db->connect();
        $result = $db->update(static::getTableName(), "WHERE ID='$this->id'", $update_hash);
        $db->disconnect();
        return $result;
    }

    /**
     * @param int $limit
     * @return (array|Model|null)
     */
    public static function first($limit = 1){
        $db = new Database();
        $db->connect();
        $result = $db->select(static::getTableName(), "*", null, null, "id ASC", $limit);
        $db->disconnect();
        if($result == null || sizeof($result) == 0) {
            return null;
        }else if($limit == 1){
            return static::initModel($result[0]);
        }else{
            return static::initModels($result);
        }
    }

    public static function last($limit = 1){
        $db = new Database();
        $db->connect();
        $result = $db->select(static::getTableName(), "*", null, null, "id DESC", $limit);
        $db->disconnect();
        if($result == null || sizeof($result) == 0) {
            return null;
        }else if($limit == 1){
            return static::initModel($result[0]);
        }else{
            return static::initModels($result);
        }
    }

    private static function initModel($result){
        $class = "Class".static::getTableName();
        return new $class($result);
    }

    private static function initModels($result){
        $models = [];
        foreach($result as $result_set) array_push($models, initModel($result_set));
        return $models;
    }
}