<?php
if($_SERVER['REQUEST_METHOD'] === "GET") {
    load_template("templates/register.php", []);
}elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = get_param("username", null, "POST");
    $email = get_param("email", null, "POST");
    $password = get_param("password", null, "POST");
    $password_confirm = get_param("password_confirm", null, "POST");
    //TODO SEND EMAIL
    //redirect to mail_sent
    header('Location: ' . "/mail_sent");
}