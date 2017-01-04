<ul class="basket-list">
	<?php
	$images = "";
	foreach(array_keys($options['images']) as $picture_id) {
		$images .= "<li>" . $options['images'][$picture_id]['pieces']  . "x " . $options['images'][$picture_id]['picture']->getTitle() .
            "  (" . money_format('%.2n CHF', $options['images'][$picture_id]['picture']->getPrice()) . ")</li>";
	}
	if(empty($options['images'])){
		$images .= "Your basket is empty";
	}else{
	    $images .= "<p>Total: " . $options['price'] . "</p>";
		$images .= "<a href='/checkout'><button>Checkout</button></a>";
	}
	echo $images;
	?>
</ul>