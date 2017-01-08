<div>
<?php
$html = "";
$html .= "<h4>Today 50% discount for the following pictures!</h4>";
foreach($options['offer']->pictures() as $picture){
	$html .= "<div><img src='/" . $picture->getThumbnailPath() . "' /><br><span>" .
		$picture->getTitle() . " *** " . money_format('%.2n CHF', $picture->getPrice()*0.5)."</span>";
}
echo $html;
?>
</div>