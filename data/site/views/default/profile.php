<?php

if (isset($_SESSION['logged_in']))
	echo ("<p><a href='/profiles/". current_user()->getId() ."'>My Profile</a><p>" . current_user()->getFirstName() . " " . current_user()->getLastName() . " (" . current_user()->getUsername() . ")" . "</p>"
		."<button onClick='logout();'>Logout</button>");
else {

	echo "<form action='/login' method='post'>" .
		"<label for='username'>Username</label>" .
		"<input type='text' autocomplete='false' required='required' name='username' />" .
		"<label for='password'>Password</label>" .
		"<input type='password' required='required' name='password' />" .
		"<div class='eqWrap'><div class='eq equalHW'><input type='submit' value='Login'></div>" .
		"<div class='eq equalHW'><a href='/register'>Register</a></div>".
		"</div>" .
		"</form>";
}