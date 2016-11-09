<?php
$pages = [
    'home',
    'detail',
    'upload',
    'register',
    'tags',
];

$languages = [
    "de",
    "en"
];

$urlbase = 'http://localhost:8080/';
$language = "de";

function load_template($template, array $options) {
    $options["language"] = $GLOBALS['language'];
    $options["languages"] = $GLOBALS['languages'];
    $options["pages"] = $GLOBALS['pages'];
    $options["page"] = $GLOBALS['page'];
    include $template;
}

function get_param($var, $default)
{
	if (isset($_GET[$var])) {
		return urldecode($_GET[$var]);
	}
	return $default;
}
