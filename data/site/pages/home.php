<?php
$pictures = Picture::last(10);

load_template('templates/home.php', [
	'pictures' => $pictures,
]);