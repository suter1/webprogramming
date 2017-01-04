<?php require_once("views/default/default_header.php"); ?>

<section class="section images">
	<h2><?php echo $options['my_pictures']; ?></h2>
	<?php
	$pictures_html="";
	foreach($options['pictures'] as $picture){
		$pictures_html .= "<img src='/" .$picture->getThumbnailPath(). "' />";
	}
	if(sizeof($options['pictures'])===0) $pictures_html .= $options['no_pictures'];

	$pictures_html .= "<br /><a href='/upload/new'>" . $options['upload']  ."</a>";
	echo $pictures_html;
	?>

	<h2><?php echo $options['my_orders']; ?></h2>
	<?php
	$orders_html = "";
	foreach($options['orders'] as $order){
		$orders_html .= "<img src='/" .$order->getThumbnailPath(). "' />";
	}
	echo $orders_html;
	if(sizeof($options['orders']) === 0) echo $options['no_orders'];
	?>
    <br>
    <h2>Edit Profile</h2>
    <a href="/user/<?php echo $options['user']->getId() ?>/edit"><?php echo $options['edit'] ?></a>
</section>
<?php require_once("views/default/footer.php") ?>
