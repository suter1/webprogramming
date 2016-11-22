<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 22.11.2016
 * Time: 21:48
 */

if(get_param("logout", null, "POST") === "Logout") {
	session_destroy();
}
redirect('/home');
