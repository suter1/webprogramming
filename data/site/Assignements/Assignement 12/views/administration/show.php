<?php require_once("views/default/default_header.php"); ?>


    <section class="section">
		<?php
		if (isset($_SESSION['logged_in'])) {
			$localization = Localization::find_by(["qualifier" => 'upload', 'lang' => 'de']);
			echo "<h2 name='useradmin'>. $localization->getValue().</h2>";
			echo "<table style=\"width:100%\"><tr><th>Id</th><th>Username</th><th>First name</th><th>Last Name</th><th>Delete</th></tr>";

			echo "</table>";
		} else {
		}
		?>
	</section>
<?php require_once("views/default/footer.php") ?>