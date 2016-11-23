<?php
/**
 * @autor fluht1
 * @param $class_name
 */
function __autoload($class_name){
	$snake_case_class = strtolower(preg_replace('/(?<!^)[A-Z]+/', '_$0', $class_name));
	$found = false;
    foreach ($GLOBALS['directories'] as $dir) {
		$dir = explode("site", $dir)[1];
        if($dir != null) $path = __DIR__ . '/' . $dir . '/'. $snake_case_class . '.php';
        else $path = $snake_case_class . '.php';
        if (file_exists($path)) {
			$found = true;
            require_once($path);
            break;
        }
   }
   if(!$found){
	   echo "<br /> $class_name";
	   var_dump($GLOBALS['directories']);

   }
}