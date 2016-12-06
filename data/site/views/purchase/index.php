<ul class="basket-list">
	<?php
	$images = "";
	foreach($options['images'] as $image) {
		$images .= "<li>" . $image->getTitle() . "</li>";
	}
	if(empty($options['images'])){
		$images .= "Your basket is empty";
	}else{
		$images .= "<button>Checkout</button>";
	}
	echo $images;
	?>
</ul>