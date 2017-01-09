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
<div id="license-confirm" style="display: none" title="License Agreement">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
		<?php echo $options['lang_license'] ?></p>
</div>
<button onclick="licenseAgreement(); return false;"><?php echo $options['lang_buy_now'] ?></button>
<?php require_once("views/default/footer.php") ?>
