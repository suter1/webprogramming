<?php
require_once(__DIR__ . "/model_structure.php");
require_once("autoload.php");
abstract class Model implements ModelStructure {
    private $methods = array();

    /**
     * Model constructor.
     */
    protected function __construct(){
        $this->build_associations();
    }

    /**
     *  SELECT * FROM pictures LEFT JOIN pictures_tags ON
     * pictures.id = pictures_tags.picture_id LEFT JOIN tags ON tags.id = pictures_tags.tag_id WHERE pictures.id = 1;
     * $configuration = ["class_name", "join_table", "foreign_key", "association_key"]
     */
    private function build_associations(){

        foreach ($this->has_and_belongs_to_many() as $association => $configuration){
            $func = function() use ($association, $configuration) {
                $current_table = static::getTableName();
                $db = new Database();
                $db->connect();
                $join =  $configuration['join_table'] . " ON " . $configuration['foreign_key'] . " = " . $current_table .".id"  .
                    " LEFT JOIN " . $association . " ON " . $configuration['association_key'] . " = " . $association . ".id ".
                    " WHERE ". $current_table . ".id = " . $this->getId();
                $result = $db->select($current_table, $association.".*", $join);
                return static::initModels($result, $configuration['class_name']);
            };
            $this->addMethod($association, $func);
        }
    }

    protected abstract function has_and_belongs_to_many();

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
        if($result === TRUE){
            return static::last();//static::find_by($insert_array); //last or find by insert array (transaction would be better)
        }
        $db->disconnect();
        return null;
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
        $result = $db->select(static::getTableName(), "*", null, null, " id DESC ", $limit);
        $db->disconnect();
        if($result == null || sizeof($result) == 0) {
            return null;
        }else if($limit == 1){
            return static::initModel($result[0]);
        }else{
            return static::initModels($result);
        }
    }

    private static function initModel($result, $class = null){
        if($class == null) $class = static::class;
        $object =  new $class($result);
        return $object;
    }

    private static function initModels($result = [], $class = null){
        $models = [];
        foreach($result as $result_set) array_push($models, static::initModel($result_set, $class));
        return $models;
    }

    protected function addMethod($methodName, $methodCallable){
        if (!is_callable($methodCallable)) {
            throw new InvalidArgumentException('Second param must be callable');
        }
        $this->methods[$methodName] = Closure::bind($methodCallable, $this, get_class());
    }

    public function __call($methodName, array $args){
        if (isset($this->methods[$methodName])) {
            return call_user_func_array($this->methods[$methodName], $args);
        }
        throw new RunTimeException('There is no method with the given name to call');
    }
}