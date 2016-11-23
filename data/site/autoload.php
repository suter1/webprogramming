<?php
/**
 * @autor fluht1
 * @param $className
 */
function __autoload($className){
	$snake_case_class = strtolower(preg_replace('/(?<!^)[A-Z]+/', '_$0', $className));
    $directories = array_merge(glob('./*' , GLOB_ONLYDIR), glob('./**/*' , GLOB_ONLYDIR));
    foreach ($directories as $dir) {
        if($dir != null) $path = __DIR__ . '/' . $dir . '/'. $snake_case_class . '.php';
        else $path = $snake_case_class . '.php';
        if (file_exists($path)) {
            require_once($path);
            break;
        }
   }
}