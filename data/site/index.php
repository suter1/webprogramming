<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="isithombe_default.css"/>
	<meta charset="UTF-8"/>
	<title>Insert title here</title>
</head>
<body>
<div class="flex-container">
<?php include_once ("header.php");?>

    <?php include("navigation.php") ?>

	<aside class="aside_left">
		<p>Article left aside</p>
	</aside>

	<?php
	$pages = ['home' => 'home.php',
	          'detail' => 'detail.php'];
	if(isset($_GET['site'])) $content = $_GET['site'];
	if(isset($content) && array_key_exists($content, $pages)){
		include($pages[$content]);
	}else{
		include('home.php');
	}
	?>

	<aside class="aside_right">
		<p>Aside rechts</p>
	</aside>
</div>
</body>
</html>