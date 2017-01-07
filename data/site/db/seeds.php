<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 22/11/16
 * Time: 18:21
 */
require_once('autoload.php');
$reinsert = true;
$database = new Database();
$database->connect();
$langs = [
	'de' => [
		'detail'        => "Detailansicht",
		'home'          => "Startseite",
		'upload'        => "hochladen",
		'register'      => "Registrieren",
		'my_pictures'   => 'Meine Bilder',
		'no_pictures'   => 'Sie haben bisher keine Bilder hochgeladen.',
		'my_orders'     => 'Meine Einkäufe',
		'no_orders'     => 'Sie haben bisher keine Einkäufe.',
		'categories'    => 'Kategorien',
		'username'      => 'Benutzername',
		'password'      => 'Passwort',
		'login'         => 'Anmelden',
		'profile'       => 'Mein Profil',
		'logout'        => 'Abmelden',
		'camera_model'  => 'Kamera',
		'aperture'		=> 'Blende',
		'exposure_time' => 'Verschlusszeit',
		'price'			=> 'Preis',
		'title'			=> 'Titel',
		'search'		=> 'Suche',
		'created_at'    => 'Aufnahmedatum',
		'uploaded_at'   => 'Hochgeladen am',
		'owner'         => 'Besitzer',
		'order_date'    => 'Bestelldatum',
		'first_name'    => 'Vorname',
		'last_name'     => 'Nachname',
		'email'         => 'E-Mail Adresse',
		'sex'           => 'Geschlecht',
		'male'          => 'männlich',
		'female'        => 'weiblich',
		'edit'          => 'Bearbeiten',
		'search'		=> 'Suche',
		'buy'			=> 'Kaufen',
		'no_result'		=> 'Keine Einträge gefunden.',
		'basket'		=> 'Warenkorb',
		'lens'          => 'Objektiv',
		'size'          => 'Grösse',
	],
	'en' => [
		'detail'        => 'Details',
		'home'          => 'Home',
		'upload'        => "Upload",
		'register'      => 'Register',
		'my_pictures'   => 'My pictures',
		'no_pictures'   => "Currently you haven't uploaded any pictures.",
		'my_orders'     => 'My Orders',
		'no_orders'     => "You haven't bought anything yet",
		'categories'    => 'Categories',
		'username'      => 'Username',
		'password'      => 'Password',
		'login'         => 'Login',
		'profile'       => 'My profile',
		'logout'        => 'Logout',
		'camera_model'  => 'Camera',
		'aperture'		=> 'Aperture',
		'exposure_time' => 'Exposure time',
		'price'			=> 'Price',
		'title'			=> 'Title',
		'search'		=> 'Search',
		'created_at'    => 'Recording date',
		'uploaded_at'   => 'Upload date',
		'owner'        	=> 'Owner',
		'order_date'    => 'Order date',
		'first_name'    => 'First name',
		'last_name'     => 'Last name',
		'email'         => 'E-mail address',
		'sex'           => 'Gender',
		'male'          => 'male',
		'female'        => 'female',
		'edit'          => 'Edit',
		'search'		=> 'Search',
		'buy'			=> 'Buy',
		'no_result'		=> 'Nothing found.',
		'basket'		=> 'Basket',
		'lens'          => 'Lens',
		'size'          => 'Size',
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

$default_tags = [
	'Nature', 'Politics', 'Animal', 'Cat', 'Dog', 'Sports', 'Fashion', 'Cars', 'Kitchen', 'Beauty', 'Diaröh',
	'Shit', 'Crap',
];

$default_roles = ['admin'];

foreach ($langs as $language => $entries) {
	foreach($entries as $qualifier => $value){
		$loc = Localization::find_or_create_by(['qualifier' => $qualifier, 'lang' => $language]);
		$loc->update(['value' => htmlspecialchars($value, ENT_QUOTES)]);
	}
}
foreach ($default_tags as $tag) {
	$tag = Tag::find_or_create_by(['name' => $tag]);
}

foreach ($default_roles as $role) {
	$tag = Role::find_or_create_by(['name' => $tag]);
}


if(false){
	foreach ($admin_users as $user){
		User::find_or_create_by($user);
	}
}
$database->disconnect();