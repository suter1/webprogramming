<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */
require_once "autoload.php";
$lang = get_param('lang', 'de');
$categories = ["Home"];
$navigation = "<div class='navigation-placeholder'></div><nav class='nav'><ul>";
foreach ($categories as $category) {
	$localization = Localization::find_by(['lang' => $lang, 'qualifier' => strtolower($category)]);
	$navigation .= "<li class='category'><a href='/" . strtolower($category) . "'>" . $localization->getValue() . "</a></li>";
}

$site = get_param('site', 'home');
$clang = 'Deutsch';
$clangShort = 'de';
if ($lang == $clangShort) {
	$clang = 'English';
	$clangShort = 'en';
}
$navigation .= "</ul><br><br><br>";
$navigation .= "<div class='topten'><h4>Categories</h4><ul>";
$tags = Tag::all();
foreach($tags as $tag){
    $tag_name = $tag->getName();
    $tag_id = $tag->getId();
    $navigation .= "<li><a href='/tags/$tag_id'>$tag_name</a></li>";
}

$navigation .= "</ul></div>";
$url = $_SERVER['REQUEST_URI'];
$navigation .= "<br /><br /><a href='$url?site=$site&lang=$clangShort'>$clang</a></nav>";
echo $navigation;