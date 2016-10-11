<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */

$categories = array("Home", "Detail", "Shit");
$navigation = "<nav class='nav'><ul>";
foreach($categories as $category){
    $navigation = $navigation . "<li class='category'><a href='index.php?site=" . strtolower($category). "'>" . $category . "</a></li>";
}

$navigation = $navigation . "</ul></nav>";
echo $navigation;