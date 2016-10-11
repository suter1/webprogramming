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

	<?php
	$pages = ['home' => 'home.php',
	          'detail' => 'detail.php'];
	if(isset($_GET['site'])) $content = $_GET['site'];
	if(isset($content) && in_array($content, $pages)){
		include($content);
	}else{
		include('home.php');
	}
	?>
	<aside class="aside_left">
		<p>Article left aside</p>
	</aside>

	<section class="section">
		<h3>Header in Section</h3>
		<p>Absatz in einer Section</p>
        <?php include("articles.php") ?>
	</section>

	<aside class="aside_right">
		<p>Aside rechts</p>
	</aside>
</div>
</body>
</html>