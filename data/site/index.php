<?php include_once('db/init_db.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/isithombe_default.css"/>
	<meta charset="UTF-8"/>
	<title>Insert title here</title>
</head>
<body>
<div class="flex-container">
	<?php
	include_once("page_grid/header.php");
	include("page_grid/navigation.php");
	$pages = [
		'home' => 'home.php',
		'detail' => 'detail.php',
		'upload' => 'picture_upload/uploadFile.html',
		'register' => 'registration/register.php'

	];
	if (isset($_GET['site'])) $content = $_GET['site'];
	if (isset($content) && array_key_exists($content, $pages)) {
		include($pages[$content]);
	} else {
		include('home.php');
	}
	?>

	<aside class="aside_right">
		<p>Aside rechts</p>
	</aside>
</div>
</body>
</html>