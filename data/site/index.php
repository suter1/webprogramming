<?php include_once('db/init_db.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="isithombe_default.css"/>
	<meta charset="UTF-8"/>
	<title>Insert title here</title>
</head>
<body>
<div class="flex-container">
	<?php include_once("header.php"); ?>

	<?php include("navigation.php") ?>

	<aside class="aside_left">
		<p>Article left aside</p>
	</aside>

	<?php
	$pages = ['home' => 'home.php',
		'detail' => 'detail.php'];
	if (isset($_GET['site'])) $content = $_GET['site'];
	if (isset($content) && array_key_exists($content, $pages)) {
		include($pages[$content]);
	} else {
		include('home.php');
	}
	?>

	<aside class="aside_right">
		<p>Aside rechts</p>
		<img src="./gallery/0ca1d585c955e8f41c2782639b8aa061JPG" />
	</aside>
</div>
</body>
</html>