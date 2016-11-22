<?php
require_once "autoload.php";
$password = get_param('password', null, 'POST');
$username = get_param('username', null, 'POST');

$user = User::find_by(['username' => $username]);

if($user === null){
    redirect("/home");
}

if ( $out = password_verify($password, $user->getPasswordHash()) ) {
    echo "ok";
    //TODO set crappy session stuff
} else {
    echo $user->getUsername();
    echo "<br />nok <br />";
}
var_dump($out);
