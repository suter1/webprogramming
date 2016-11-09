<?php
$url = $_SERVER["REQUEST_URI"];
$params = explode("/", $url);
$picture_id = $params[2];
echo $picture_id;

/**
 * @var Picture picture
 */
$picture = Picture::find_by(['id' => $picture_id]);
$path = $picture->getPath();
$title = $picture->getTitle();
$price = $picture->getPrice();
load_template("templates/detail.php", [
    'path' => $path,
    'title' => $title,
    'price' => $price,
]);