<?php
require_once("autoload.php");

$controllers = [
	'home' => 'HomeController',
	'detail' => 'DetailController',
	'upload' => 'UploadController',
	'register' => 'RegistrationController',
	'tags' => 'TagsController',
	'login' => 'SessionController',
	'logout' => 'SessionController',
	'mail_sent' => 'MailController',
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
	$options["controllers"] = $GLOBALS['controllers'];
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
	if(isset($_SESSION['user'])) return unserialize($_SESSION['user']);
	return null;
}

function determine_method(){
	$method = null;
	$available_methods = [
		"post"   => 'create',
		'get'    => 'show',
		'delete' => 'delete',
		'patch'  => 'update',
		'put'    => 'update',
	];
	return $available_methods[determine_http_method()];
}
function determine_http_method(){
	return strtolower($_SERVER['REQUEST_METHOD']);
}

function get_controller($page){
	$class = $GLOBALS['controllers'][$page];
	return new $class();
}