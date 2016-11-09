<?php
require_once("autoload.php");
$url = $_SERVER["REQUEST_URI"];
$params = explode("/", $url);
$tag_id = $params[2];


$tag = Tag::find_by(['id' => $tag_id]);
$pictures = $tag->pictures();

load_template("templates/tags.php", [
    'pictures' => $pictures,
]);