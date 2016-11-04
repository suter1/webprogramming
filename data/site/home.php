<section class="section">
	<h3>Header in Section</h3>
	<p>Absatz in einer Section</p>
	<?php
		require_once("models/picture.php");
		$pictures = Picture::last(10);
		$pictures_html = "";

		/** @var Picture $picture */
		foreach ($pictures as $picture){
			$path = $picture->getPath();
			$title = $picture->getTitle();
			$image = "<div style='display: block; width: 100px;'><img src='$path' /> ";
			$description = "<p>$title</p></div>";
			$pictures_html .= $image . $description;
		}
		echo $pictures_html;

	?>
</section>


