<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 22/11/16
 * Time: 18:21
 */
require_once('database.php');
require_once('autoload.php');
$reinsert = false;
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

$admin_users = [
	[
		'first_name' => 'tobias',
		'last_name' => 'flühmann',
		'username' => 'tfluehmann',
		'sex' => 'male',
		'password_hash' => '$2y$10$W6zRHQBYFKRBkAHdpdbFhOfJL8xXeXcI6kRuAaBG5Lh8N0gCIAuL.',
		'email' => 't.fluehmann@whatever.ch',
	],
	[
		'first_name' => 'raphael',
		'last_name' => 'suter',
		'username' => 'rsuter',
		'sex' => 'male',
		'password_hash' => '$2y$10$W6zRHQBYFKRBkAHdpdbFhOfJL8xXeXcI6kRuAaBG5Lh8N0gCIAuL.',
		'email' => 'r.suter@whatever.ch',
	]
];
if($reinsert) {
	Localization::delete_all();
	foreach ($languages as $language => $entries) {
		foreach($entries as $qualifier => $value){
			Localization::create(['qualifier' => $qualifier, 'value' => $value, 'lang' => $language]);
		}
	}

	User::delete_all();
	foreach ($admin_users as $user){
		User::create($user);
	}
}
$database->disconnect();