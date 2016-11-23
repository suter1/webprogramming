<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<section class="section images">
	<?php
	$pictures_html="";
	foreach($options['pictures'] as $picture){
		$pictures_html .= "<img src='/" .$picture->getThumbnailPath(). "' />";
	}
	echo $pictures_html;
	?>
</section>
<?php require_once("views/default/footer.php") ?>
