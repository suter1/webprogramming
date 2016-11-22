<?php
require_once "autoload.php";
if($_SERVER['REQUEST_METHOD'] === "GET") {
    load_template("templates/register.php", []);
}elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = get_param("username", null, "POST");
    $email = get_param("email", null, "POST");
    $password = get_param("password", null, "POST");
    $password_confirm = get_param("password_confirm", null, "POST");

    if($password != $password_confirm){
        //TODO passwords do not match
        echo "fail";
        load_template("templates/register.php", []);
        die();
    }
    $user = User::find_by(['username' => $username]);
    if(is_null($user) || !isset($user)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $created_user = User::create(['username' => $username, 'email' => $email, 'password_hash' => $password_hash]);
        $header = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($created_user->getEmail(), "Please Confirm your Email.", "<p>Please Confirm your mail address here: https://whatever.ch/", $header);
        //TODO SEND EMAIL
        //redirect to mail_sent
        redirect("mail_sent");
    }else{
        echo "username already taken";
        load_template("templates/register.php", []);
        die();
        //TODO username already taken
    }
}