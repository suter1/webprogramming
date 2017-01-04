<div>
<?php
	$msg = "";
	if(isset($_SESSION['flash']) && is_array($_SESSION['flash'])){
		foreach($_SESSION['flash'] as $message){
			$msg .= "<h2 class='message'>$message</h2><br />";
		}
		$_SESSION['flash'] = [];
	}
	echo $msg;
?>
</div>
