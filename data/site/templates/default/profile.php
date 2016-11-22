<?php

if (isset($_SESSION['logged_in']))
	echo ("<p><a href='/profiles/". current_user()->getId() ."'>My Profile</a></p></p><p>" . current_user()->getFirstName() . " " . current_user()->getLastName() . " (" . current_user()->getUsername() . ")" . "</p>"
		."<form method='post' action='/logout'>"
		."<input type='submit' name='logout' value='Logout'></form>");
else echo "<form action='./login' method='post'>" .
	"<label for='username'>Username</label>" .
	"<input type='text' autocomplete='false' required='required' name='username' />" .
	"<label for='password'>Password</label>" .
	"<input type='password' required='required' name='password' />" .
	"<input type='submit' value='Login'>" .
	"</form>";
