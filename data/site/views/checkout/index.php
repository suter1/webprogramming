<?php require_once("views/default/default_header.php"); ?>

<h2><?php echo $options['basket']; ?></h2>
<?php
$out = "";
foreach($options['images'] as $item){
	$picture = $item['picture'];
    $thumb = $picture->getThumbnailPath();
    $out .= "<div style='display: inline-block; max-width: 10em; margin: 1px'><img src='$thumb' style='height: 8em; width: 8em;' /><br /><span>"
        . money_format('%.2n CHF', $picture->getPrice()) . "</span> <span>" . $picture->getTitle() . "</span></div>";
}
$out .= "<br /><div style='margin-top: 10px; background-color: #2dafaf;display: inline-block;'><span>". $options['price'] . ": " . $options['total']. "</span></div>";

echo $out;
?>
<br />
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="6RNT8A4HBBJRE">
	<input type="image"
		   src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png" alt="Buy Now">
	<img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif"
		 width="1" height="1">
</form>
<?php require_once("views/default/footer.php") ?>
