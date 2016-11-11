<?php
$url = $_SERVER["REQUEST_URI"];
$params = explode("/", $url);
$picture_id = $params[2];

$picture = Picture::find_by(['id' => $picture_id]);
load_template("templates/detail.php", [
    'path' => $picture->getPath(),
    'title' => $picture->getTitle(),
    'price' => $picture->getPrice(),
]);