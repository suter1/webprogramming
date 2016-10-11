<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */

include('functions.php');
$lang = get_param('lang','de');
$categories = ["Home", "Detail", "Shit"];
$translation = yaml_parse_file ("languages.yml");
$trans = $translation['languages'][$lang];
$navigation = "<nav class='nav'><ul>";
foreach($categories as $category){
    $navigation = $navigation . "<li class='category'><a href='index.php?site=" . strtolower($category). "'>" . $trans[strtolower($category)] . "</a></li>";
}

$navigation = $navigation . "</ul></nav>";
echo $navigation;