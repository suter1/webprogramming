<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 25.10.2016
 * Time: 20:44
 */

$success = true;
$name = $email = $e_name = $e_email = '';
if (empty($_POST['name'])) {
	$e_name = 'please input a username';
	$success = false;
} else $name = $_POST['name'];
if (empty($_POST['email']) ||
	!filter_var($_POST['email'],
		FILTER_VALIDATE_EMAIL)
) {
	$e_email = 'please input valid email address';
	$success = false;
} else $email = $_POST['email'];
if ($success) {
	echo "<p>Success!</p>";
	exit;
}