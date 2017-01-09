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
		'pictures'      => 'Bilder',
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
		'male'          => 'Herr',
		'female'        => 'Frau',
		'edit'          => 'Bearbeiten',
		'search'		=> 'Suche',
		'buy'			=> 'Kaufen',
		'no_result'		=> 'Keine Einträge gefunden.',
		'basket'		=> 'Warenkorb',
		'lens'          => 'Objektiv',
		'size'          => 'Grösse',
		'description'   => 'Beschreibung',
		'show_profile'  => 'Profil anzeigen',
		'update'        => 'Aktualisieren',
		'buy_now'       => 'Jetzt kaufen (Paypal)',
		'delete_picture' => 'Bild löschen',
		'checkout'      => 'Zur Kasse',
		'edit_profile'  => 'Profil bearbeiten',
		'budget'        => 'Kontostand',
		'payment_successful' => 'Die Zahlung war erfolgreich.',
		'nomail_payok'  => 'Die Bestätigungsmail konnte nicht versandt werden, aber die Bezahlung war erfolgreich.',
		'no_payment'    => 'Die Zahlung konnte nicht durchgeführt werden.',
		'wrong_password' => 'Bitte überprüfen Sie ihr Passwort.',
		'mail_notsent'  => 'Überprüfen Sie die Mailadresse.',
		'double_username' => 'Dieser Benutzername wird bereits verwendet. Bitte versuchen Sie einen anderen.',
		'login_error'   => 'Der Benutzer existiert nicht, das Passwort ist falsch oder ihre E-Mail-Adresse wurde noch nicht bestätigt.',
		'picture_deleted' => 'Das Bild wurde erfolgreich gelöscht.',
		'type_notallowed' => 'Dieser Dateityp ist auf dieser Seite nicht erlaubt. ',
		'select_file'   => 'Bitte wählen Sie eine Datei.',
		'no_thumbnail'  => 'Beim Erstellen der Bildvorschau ist ein Fehler aufgetreten.',
		'copyright'  	=> 'Ich bestätige hiermit die Urheberrechte an dem Bild zu haben und dieses an Isithombe Webshop zu übertragen.',
		'license'  	=> 'Ich akzeptiere hiermit die Allgmeinen Geschäftsbedingungen von Isithombe Webshop.',
		'added_picture' => 'Bild dem Warenkorb hinzugefügt',
	],
	'en' => [
		'detail'        => 'Details',
		'home'          => 'Home',
		'upload'        => "Upload",
		'register'      => 'Register',
		'my_pictures'   => 'My pictures',
		'pictures'      => 'Pictures',
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
		'male'          => 'Male',
		'female'        => 'Female',
		'edit'          => 'Edit',
		'search'		=> 'Search',
		'buy'			=> 'Buy',
		'no_result'		=> 'Nothing found.',
		'basket'		=> 'Basket',
		'lens'          => 'Lens',
		'size'          => 'Size',
		'description'   => 'Description',
		'show_profile'  => 'Show Profile',
		'update'        => 'Update',
		'buy_now'       => 'Buy now (Paypal)',
		'delete_picture' => 'Delete picture',
		'checkout'      => 'Checkout',
		'edit_profile'  => 'Edit profile',
		'budget'        => 'Credit balance',
		'payment_successful' => 'The payment was successful.',
		'nomail_payok'  => 'Mail could not be send, but the payment was successful.',
		'no_payment'    => 'The payment wasn\'t successfully',
		'wrong_password' => 'Please check your password.',
		'mail_notsent'  => 'Please check your mail address.',
		'double_username' => 'This username is already taken. Please try another one.',
		'login_error'   => 'User does not exist, password is wrong or email is not confirmed.',
		'picture_deleted' => 'The picture is successfully deleted.',
		'type_notallowed' => 'This file type is not allowed to upload to this site. ',
		'select_file'   => 'Please select a file.',
		'no_thumbnail'  => 'An error occured on creating a thumbnail.',
		'copyright'  	=> 'I confirm, I have the full copyright on the picture and will hand it over to isithombe webshop',
		'license'  	=> 'I accept the license agreement with isithombe webshop',
		'added_picture' => 'Added picture to basket',
		'login_successful' => 'You are logged in now',
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
		'is_admin' => '1',
		'email_confirmed' => '1',
	],
	[
		'first_name' => 'raphael',
		'last_name' => 'suter',
		'username' => 'rsuter',
		'sex' => 'male',
		'password_hash' => '$2y$10$W6zRHQBYFKRBkAHdpdbFhOfJL8xXeXcI6kRuAaBG5Lh8N0gCIAuL.',
		'email' => 'r.suter@whatever.ch',
		'is_admin' => '1',
		'email_confirmed' => '1',
	]
];

$default_tags = [
	'Nature', 'Politics', 'Animal', 'Cat', 'Dog', 'Sports', 'Fashion', 'Cars', 'Kitchen', 'Beauty', 'Diaröh',
	'Shit', 'Crap',
];

foreach ($langs as $language => $entries) {
	foreach($entries as $qualifier => $value){
		$loc = Localization::find_or_create_by(['qualifier' => $qualifier, 'lang' => $language]);
		$loc->update(['value' => htmlspecialchars($value, ENT_QUOTES)]);
	}
}
foreach ($default_tags as $tag) {
	Tag::find_or_create_by(['name' => $tag]);
}

foreach ($admin_users as $user){
	$u_o = User::find_or_create_by($user);
}
$database->disconnect();