<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */
require_once "autoload.php";

//TODO move db calls to controller


$lang = get_language();
$navigation = "<div class='container eqWrap'><nav class='nav equalHW eq'>";

$site = get_param('site', 'home');
$clang = 'Deutsch';
$clangShort = 'de';
if ($lang == $clangShort) {
	$clang = 'English';
	$clangShort = 'en';
}
$categories_lang = Localization::find_by(['lang' => $lang, 'qualifier' => 'categories'])->getValue();
$navigation .= "<h4>$categories_lang</h4><ul>";
$tags = Tag::first(10);
foreach($tags as $tag){
    $tag_name = $tag->getName();
    $tag_id = $tag->getId();
    $navigation .= "<li><a href='/tags/$tag_id'>$tag_name</a></li>";
}

$navigation .= "</ul>";
$search = Localization::find_by(['qualifier' => 'search', 'lang' => get_language()])->getValue();
$navigation .= "<div class='tag_search'><input type='text' maxlength='15' minlength='3' placeholder='$search tag...'/>";
$url = explode("?", $_SERVER['REQUEST_URI'])[0];
$navigation .= "<br /><br /><a href='$url?lang=$clangShort'>$clang</a></nav><div id='content' class='equalHW eq'>";
echo $navigation;