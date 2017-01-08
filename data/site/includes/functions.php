<?php
require_once("autoload.php");

$controllers = [
	'home' 			=> 'HomeController',
	'detail' 		=> 'DetailController',
	'upload'		=> 'UploadController',
	'register' 		=> 'RegistrationController',
	'tags'			=> 'TagsController',
	'login'			=> 'SessionController',
	'logout' 		=> 'SessionController',
	'mail_sent' 	=> 'MailController',
	'profile'   	=> 'ProfileController',
	'purchase'		=> 'PurchaseController',
	'pictures'		=> 'PicturesController',
	'checkout'		=> 'CheckoutController',
	'activation'	=> 'ActivationController',
	'user'			=> 'UserController',
	'admin'			=> 'AdminController',
	'payment'		=> 'PaymentController',
	'order'			=> 'OrderController',
	'special_offer'	=> 'SpecialOfferController',
	'current_offer'	=> 'CurrentOfferController',
];
$dir = $_SERVER['DOCUMENT_ROOT'];
$directories = array_merge(glob("$dir/*" , GLOB_ONLYDIR), glob("$dir/**/*", GLOB_ONLYDIR));

$languages = [
	"de",
	"en"
];

function load_template($template, array $options = []) {
	$options["language"] = get_language();
	$options["languages"] = $GLOBALS['languages'];
	$options["controllers"] = $GLOBALS['controllers'];
	$options["page"] = $GLOBALS['page'];
	include $template;
}

function require_ajax(){
	$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
	if(!$isAjax) {
		die("Access denied");
	}
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
	if(isset($_SESSION['user_id'])) return User::find_by(['id' => $_SESSION['user_id'] ]);
	return null;
}

/**
 * Determines the method by the http method and the url
 *
 * method   HTTP Verb   path
 * index    GET         <controller>/
 * show     GET         <controller>/:id
 * edit     GET         <controller>/:id/edit
 * newly    GET         <controller>/new
 * post     POST        <controller>/:id
 * delete   DELETE      <controller>/:id
 * update   PATCH       <controller>/:id
 * update   PUT         <controller>/:id
 *
 * @return mixed
 */
function determine_method(){
	$default_rgx = '/\w*\/\d{1,}(\?.+)?$/'; // /<whatever>/:id or /<whatever>/:id?what=a_shit
	$any_page = '/\w*[^\/\d](\?.+)?$/'; // /<whatever> or /<whatever>?what=a_shit
	$available_methods = [
		'post'   => [
			['rgx' => $default_rgx, 'method' => 'create'],
			['rgx' => $any_page, 'method' => 'create']
		],
		'get'    => [
			['rgx' => $default_rgx, 					'method' => 'show'],
			['rgx' => '/\w*\/\d{1,}\/edit(\?.+)?$/', 	'method' => 'edit'],
			['rgx' => '/\w*\/new(\?.+)?$/', 			'method' => 'newly'], //NOTICE new is a keyword...
			['rgx' => $any_page, 						'method' => 'index'],
		],
		'delete' => [
			['rgx' => $default_rgx,		'method' => 'delete'],
			['rgx' => $any_page, 		'method' => 'delete']
		],
		'patch'  => [
			['rgx' => $default_rgx, 'method' => 'update']
		],
		'put'    => [
			['rgx' => $default_rgx, 'method' => 'update']
		],
	];
	$url = $_SERVER['REQUEST_URI'];
	$methods = $available_methods[determine_http_method()];
	foreach($methods as $route){
		if(preg_match($route['rgx'], $url)) return $route['method'];
	}
	return null;
}
function determine_http_method(){
	$method = strtolower($_SERVER['REQUEST_METHOD']);
	return $method;
}

function get_controller($page){
	$class = $GLOBALS['controllers'][$page];
	return new $class();
}

function set_language(){
	$lang = get_param('lang');
	if($lang !== null && in_array($lang, $GLOBALS['languages'])){
		setcookie("lang", $lang, time() + (86400 * 30), "/");
		$_COOKIE['lang'] = $lang;
	} // 30 days
}

function get_language(){
	if(isset($_COOKIE['lang'])) return $_COOKIE['lang'];
	return 'de';
}