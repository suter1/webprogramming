<?php
require_once("autoload.php");
require_once("includes/functions.php");
$pictures = Picture::last(10);

load_template('templates/home.php', [
	'pictures' => $pictures,
]);