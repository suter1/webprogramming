<span class="toggle"><i class="fa fa-user-circle" aria-hidden="true"></i>
	<div class="toggle_div hide">
		<div class="arrow-up"></div>
		<div class="popup">
		<?php

		if (isset($_SESSION['logged_in'])) {
			$localization = Localization::find_by(["qualifier" => 'upload', 'lang' => 'de']);
			$popup_html = "";
			$popup_html .= "<p><a href='/profile/" . current_user()->getId() . "'>My Profile</a><p>";
			$popup_html .= current_user()->getFirstName() . " " . current_user()->getLastName() . " (" . current_user()->getUsername() . ")" . "</p>";
			$popup_html .= "<a href='/upload/new'>" . $localization->getValue() . "</a>";
			$popup_html .= "<button onClick='logout();' style='bottom: 0; left: 0; position: absolute;'>Logout</button><br />";
			echo $popup_html;
		} else {
			$login_html = "";
			$login_html .= "<form action='/login' method='post'>";
			$login_html .= "<label for='username'>Username</label>";
			$login_html .= "<input type='text' autocomplete='false' required='required' name='username' />";
			$login_html .= "<label for='password'>Password</label>";
			$login_html .= "<input type='password' required='required' name='password' />";
			$login_html .= "<div class='eqWrap'><div class='eq equalHW'><input type='submit' value='Login'></div>";
			$login_html .= "<div class='eq equalHW'><a href='/register'>Register</a></div>";
			$login_html .= "</div>";
			$login_html .= "</form>";
			echo $login_html;
		} ?>
		</div>
	</div>
</span>