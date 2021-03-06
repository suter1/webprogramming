<?php
require_once(__DIR__ . "/model_structure.php");
require_once("autoload.php");
abstract class Model implements ModelStructure {
    private $methods = array();

    /**
     * Model constructor.
     */
    protected function __construct(){
        $this->build_many_to_many_associations();
		$this->build_many_to_one_associations();
		$this->build_one_to_many_associations();
    }

    /**
     *  SELECT * FROM pictures LEFT JOIN pictures_tags ON
     * pictures.id = pictures_tags.picture_id LEFT JOIN tags ON tags.id = pictures_tags.tag_id WHERE pictures.id = 1;
     * $configuration = ["class_name", "join_table", "foreign_key", "association_key"]
     */
    private function build_many_to_many_associations() {
		foreach ($this->has_and_belongs_to_many() as $association => $configuration) {
			$func = function () use ($association, $configuration) {
				$current_table = static::getTableName();
				$db = new Database();
				$db->connect();
				$join = $configuration['join_table'] . " ON " . $configuration['foreign_key'] . " = " . $current_table . ".id" .
					" LEFT JOIN " . $association . " ON " . $configuration['association_key'] . " = " . $association . ".id " .
					" WHERE " . $current_table . ".id = " . $this->getId();
				$result = $db->select($current_table, $association . ".*", $join);
				return static::initModels($result, $configuration['class_name']);
			};
			$this->addMethod($association, $func);
		}
	}

	private function build_one_to_many_associations() {
		foreach ($this->has_many() as $association => $configuration) {
			$func = function () use ($association, $configuration) {
				$current_table = static::getTableName();
				$db = new Database();
				$db->connect();
				$join = $configuration['foreign_table'] . " ON " . $configuration['foreign_key'] . " = " . $current_table . ".id";
				$where = " " . $current_table . ".id = " . $this->getId();
				$result = $db->select($current_table, $association . ".*", $join, $where);
				return static::initModels($result, $configuration['class_name']);
			};
			$this->addMethod($association, $func);
		}
	}

	private function build_many_to_one_associations(){
	}

	protected abstract function has_and_belongs_to_many();
	protected abstract function has_many();

    /**
     * ['key' => 'value', 'key' => 'value']
     * @param search_array
     * @return Model result
     */
    public static function find_by($search_array){
        $where = "";
        $index = 0;
        foreach($search_array as $key => $value){
            $where .= "`$key`= '$value'";
            if(++$index < sizeof($search_array)) $where .= " AND ";
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

    public static function find_or_create_by($find_or_create_array){
		$model = static::find_by($find_or_create_array);
		if($model !== null) return $model;
		return static::create($find_or_create_array);
	}

	/**
	 * @param $order
	 * @return Model Array
	 */
	public static function all($order = 'id asc'){
		$db = new Database();
		$db->connect();
		$result = $db->select(static::getTableName(), '*', null, null, $order);
		$db->disconnect();
		return static::initModels($result);
	}
	/**
	 * @param $order
	 * @param $where
	 * @param $limit
	 * @param $andOr
	 * @return Model Array
	 *
	 */
	public static function where($where = [], $andOr = [], $order = 'id asc', $limit = null){
		$db = new Database();
		$db->connect();
		$where_query = "";
		$counter = 0;
		foreach($where as $key => $value){
			if(is_array($value)){
				$where_query .= " " . htmlspecialchars($key) . " " . $value['comparator'] . " '" . htmlspecialchars($value['value']). "' ";
			}else {
				$where_query .= " " . htmlspecialchars($key) . " LIKE '%" . htmlspecialchars($value) . "%' ";
			}
			if(isset($andOr[$counter])) $where_query .= htmlspecialchars($andOr[$counter]);
			$counter++;
		}
		$result = $db->select(static::getTableName(), '*', null, $where_query, $order, $limit);
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
        $result = $db->update(static::getTableName(), " `". static::getPrimaryKey() ."`=".$this->getId(), $update_hash);
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
        $result = $db->select(static::getTableName(), "*", null, null, " " . static::getPrimaryKey() ." ASC", $limit);
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
        $result = $db->select(static::getTableName(), "*", null, null, " " . static::getPrimaryKey() . " DESC ", $limit);
        $db->disconnect();
        if($result == null || sizeof($result) == 0) {
            return null;
        }else if($limit == 1){
            return static::initModel($result[0]);
        }else{
            return static::initModels($result);
        }
    }

    public function delete(){
		$db = new Database();
		$db->connect();
		$where = static::getPrimaryKey() . " = " . $this->getId();
		$result = $db->delete(static::getTableName(), $where);
		$db->disconnect();
		return $result;
	}

	public static function delete_all($where = null){
		$db = new Database();
		$db->connect();
		$result = $db->delete(static::getTableName(), $where);
		$db->disconnect();
		return $result;
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