<div>
<?php
$html = "";
$html .= "<h4>" . $options['lang_offer'] . "</h4>";
if(isset($options['offer']) && !is_null($options['offer'])) {
	foreach ($options['offer']->pictures() as $picture) {
		$html .= "<div><a href='/detail/" . $picture->getId() . "'>
	<img src='/" . $picture->getThumbnailPath() . "' />
	<br>
	<span>" . $picture->getTitle() . " *** " . money_format('%.2n CHF', $picture->getPrice()) . "</span>
	</a>
	</div>";
	}
}
echo $html;
?>
</div>