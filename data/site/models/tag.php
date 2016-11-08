<?php
require_once("autoload.php");
class Tag extends Model {
    private $name;

    function __construct($values) {
        parent::__construct();
        $this->id = $values['id'];
        $this->name = $values['name'];
    }

    static function getTableName(){
        return "tags";
    }

    protected function has_and_belongs_to_many() {
        return ["pictures" =>[
            "class_name" => "Picture",
            "join_table" => "pictures_tags",
            "foreign_key" => "tag_id",
            "association_key" => "picture_id"]
        ];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}