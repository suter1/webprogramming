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

	<section class="section">
		<h3>Header in Section</h3>
		<p>Absatz in einer Section</p>
		<article class="article">
			<h4>Header in Article in Section</h4>
			<p>Absatz in Article einer Section</p>
		</article>
	</section>

	<aside class="aside_right">
		<p>Aside rechts</p>
	</aside>
</div>
</body>
</html>