<ul class="basket-list">
	<?php
	$images = "";
	foreach(array_keys($options['images']) as $picture_id) {
		$images .= "<li id='basket_item_$picture_id'>";
		$images .= $options['images'][$picture_id]['pieces']  . "x " . $options['images'][$picture_id]['picture']->getTitle() .
            "  (" . money_format('%.2n CHF', $options['images'][$picture_id]['picture']->getPrice()) . ")";
		$images .= " <i class='fa fa-trash' onclick='deleteFromBasket(" . $picture_id . ")' aria-hidden='true'></i>";
		$images .= "</li>";
	}
	if(empty($options['images'])){
		$images .= "Your basket is empty";
	}else{
	    $images .= "<p>Total: " . $options['price'] . "</p>";
		$images .= "<a href='/checkout'><button>" . $options['lang_checkout'] . "</button></a>";
	}
	echo $images;
	?>
</ul>