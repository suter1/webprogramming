<?php

if(isset($_SESSION['logged_in'])) echo "<p>yes.... logged in --- create a stupid object to render here</p>";
else echo "<form action='./login' method='post'>" .
	"<label for='username'>Username</label>" .
	"<input type='text' autocomplete='false' required='required' name='username' />" .
	"<label for='password'>Password</label>" .
	"<input type='password' required='required' name='password' />" .
	"<input type='submit' value='Login'>" .
	"</form>";
