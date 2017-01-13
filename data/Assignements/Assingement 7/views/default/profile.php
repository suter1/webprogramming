<span class="toggle"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
	<div class="toggle_div hide">
		<div class="arrow-up"></div>
		<div class="popup">
		<?php
		require_once 'autoload.php';
		if (isset($_SESSION['logged_in'])) {
			$locmyprofile = Localization::find_by(["qualifier" => 'profile', 'lang' => get_language()]);
			$locupload = Localization::find_by(["qualifier" => 'upload', 'lang' => get_language()]);
			$loclogout = Localization::find_by(["qualifier" => 'logout', 'lang' => get_language()]);
			$popup_html = "";
			$popup_html .= "<p><a href='/profile/" . current_user()->getId() . "'>". $locmyprofile->getValue() ."</a><p>";
			$popup_html .= current_user()->getFirstName() . " " . current_user()->getLastName() . " (" . current_user()->getUsername() . ")" . "</p>";
			$popup_html .= "<a href='/upload/new'>" . $locupload->getValue() . "</a>";
			$popup_html .= "<button onClick='logout();' style='bottom: 0; left: 0; position: absolute;' name='logout'>". $loclogout->getValue() ."</button><br />";
			echo $popup_html;
		} else {
			$locuser = Localization::find_by(["qualifier" => 'username', 'lang' => get_language()]);
			$locpassword = Localization::find_by(["qualifier" => 'password', 'lang' => get_language()]);
			$loclogin = Localization::find_by(["qualifier" => 'login', 'lang' => get_language()]);
			$locregister = Localization::find_by(["qualifier" => 'register', 'lang' => get_language()]);
			$login_html = "";
			$login_html .= "<form action='/login' method='post'>";
			$login_html .= "<label for='username'>" . $locuser->getValue() . "</label>";
			$login_html .= "<input type='text' autocomplete='false' required='required' name='username' />";
			$login_html .= "<label for='password'>" . $locpassword->getValue() . "</label>";
			$login_html .= "<input type='password' required='required' name='password' />";
			$login_html .= "<div class='eqWrap'><div class='eq equalHW'><input type='submit' value='". $loclogin->getValue() ."'></div>";
			$login_html .= "<div class='eq equalHW'><a href='/register'><button type='button'>" . $locregister->getValue() . "</button></a></div>";
			$login_html .= "</div>";
			$login_html .= "</form>";
			echo $login_html;
		} ?>
		</div>
	</div>
</span>