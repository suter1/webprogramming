<span class="toggle"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
	<div class="toggle_div hide">
		<div class="arrow-up"></div>
		<div class="popup">
		<?php
		if(isset($_SESSION['basket'])) $_SESSION['basket']->render();
		else echo "<p>Your basket is empty.</p>";
		?>
		</div>
	</div>
</span>
