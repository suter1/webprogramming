<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 22/11/16
 * Time: 18:21
 */
require_once('database.php');
require_once('autoload.php');
$reinsert = true;
$database = new Database();
$database->connect();
$languages = [
	'de' => [
		'detail' => "Detailansicht",
		'home' => "Startseite",
		'upload' => "hochladen",
		'register' => "Registrieren",
		'my_pictures' => 'Meine Bilder',
		'no_pictures' => 'Sie haben bisher keine Bilder hochgeladen.',
		'my_orders' => 'Meine Einkäufe',
		'no_orders' => 'Sie haben bisher keine Einkäufe.',
	],
	'en' => [
		'detail' => 'Details',
		'home' => 'Home',
		'upload' => "Upload",
		'register' => 'Register',
		'my_pictures' => 'My Pictures',
		'no_pictures' => "Currently you haven't uploaded any pictures.",
		'my_orders' => 'My Orders',
		'no_orders' => "You haven't bought anything yet",
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


}
if(false){
	User::delete_all();
	foreach ($admin_users as $user){
		User::create($user);
	}
}
$database->disconnect();