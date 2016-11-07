<?php
function __autoload($className){
    $directories = ['models', 'db', __DIR__, null];
    foreach ($directories as $dir) {
        if($dir != null){
            $path = __DIR__ . '/' . $dir . '/'. strtolower($className) . '.php';
        }else{
            $path = strtolower($className) . '.php';
        }
        //echo $path . "<br>";
        if (file_exists($path)) {
           // echo $path . " exists";
            require_once($path);
            break;
        }
   }
}