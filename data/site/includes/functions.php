<?php
$pages = [
	'home',
	'detail',
	'upload',
	'register',
	'tags',
	'mail_sent',
	'login',
];

$languages = [
	"de",
	"en"
];

$urlbase = 'http://localhost:8080/';
$language = "de";

function load_template($template, array $options = []) {
	$options["language"] = $GLOBALS['language'];
	$options["languages"] = $GLOBALS['languages'];
	$options["pages"] = $GLOBALS['pages'];
	$options["page"] = $GLOBALS['page'];
	include $template;
}

function get_param($var, $default = null, $type = "GET") {
	if ($type === "GET")
		$method = $_GET;
	elseif ($type === "POST")
		$method = $_POST;
	//   $method = constant('$_' . $type);
	//  $method = ${'$_'.$type};
	if (isset($method) && isset($method[$var])) {
		return urldecode($method[$var]);
	}
	return $default;
}

function redirect($url, $statusCode = 303) {
	header('Location: ' . $url, true, $statusCode);
	die();
}

function current_user(){
	if(isset($_SESSION['user_id'])) return User::find_by(['id' => $_SESSION['user_id']]);
	return null;
}