<?php
require_once("autoload.php");
class Tag extends Model {
    private $name;

    function __construct($values) {
        parent::__construct();
        $this->name = $values['name'];
    }

    static function getTableName(){
        return "tags";
    }

    protected function has_and_belongs_to_many() {
        return [];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}