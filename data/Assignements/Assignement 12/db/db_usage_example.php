<?php

require_once("db/database.php");
$database = new Database();
echo "here we go";
echo $database->connect();

echo $database->sql("SHOW TABLES FROM isithombe");
echo $database->insert("tester", ['name' => 'test']);

while($res = $database->select('tester')){
break;
}