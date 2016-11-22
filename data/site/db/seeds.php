<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 22/11/16
 * Time: 18:21
 */
require_once('connection.php');
require_once('autoload.php');
$reinsert = true;
$database = new Database();
$database->connect();
$languages = ['de' => [
		'detail' => "Detailansicht",
		'home' => "Startseite",
		'upload' => "hochladen",
		'register' => "Registrieren",
	],
	'en' => [
		'detail' => 'Details',
		'home' => 'Home',
		'upload' => "Upload",
		'register' => 'Register',
	],
];
if($reinsert) {
	Localization::delete_all();
	foreach ($languages as $language => $entries) {
		foreach($entries as $qualifier => $value){
			Localization::create(['qualifier' => $qualifier, 'value' => $value, 'lang' => $language]);
		}
	}
}
$database->disconnect();