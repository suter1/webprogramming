<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */

include('functions.php');
$lang = get_param('lang', 'de');
$categories = ["Home", "Detail", "Shit"];
$translation = yaml_parse_file("languages.yml");
$trans = $translation['languages'][$lang];
$navigation = "<nav class='nav'><ul>";
foreach ($categories as $category) {
	$navigation = $navigation . "<li class='category'><a href='index.php?site=" . strtolower($category) . "&lang=$lang'>" . $trans[strtolower($category)] . "</a></li>";
}
$site = get_param('site', 'home');
$clang = 'Deutsch';
$clangShort = 'de';
if ($lang == $clangShort) {
	$clang = 'English';
	$clangShort = 'en';
}
$navigation = $navigation . "</ul><br><br><br><a href='index.php?site=$site&lang=$clangShort'>$clang</a></nav>";
echo $navigation;