<ul class="basket-list">
	<?php
	$images = "";
	foreach(array_keys($options['images']) as $picture_id) {
		$images .= "<li>" . $options['images'][$picture_id]['pieces']  . "x " . $options['images'][$picture_id]['picture']->getTitle() .
            "  (" . $options['images'][$picture_id]['picture']->getPrice() ."CHF)</li>";
	}
	if(empty($options['images'])){
		$images .= "Your basket is empty";
	}else{
	    $images .= "<p>Total: " . $options['price'] . " CHF</p>";
		$images .= "<button>Checkout</button>";
	}
	echo $images;
	?>
</ul>