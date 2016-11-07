<section class="section images">
	<h3>Header in Section</h3>
	<p>Absatz in einer Section</p>
	<?php
		require_once("models/picture.php");
		$pictures = Picture::last(10);
		$pictures_html = "";

		/** @var Picture $picture
		 * @var Tag $tag
		 */
		if(sizeof($pictures) > 0)
			foreach ($pictures as $picture)
				if(file_exists($picture->getPath())) {
					$title = $picture->getTitle();
					$image = "<div class='image'><img src='" . $picture->getPath() . "' /> ";
					$description = "<p>$title</p>";

					var_dump($picture->tags());
					foreach($picture->tags() as $tag){
						$description .= "<p>" . $tag->getName() . "</p>";
					}
					$description .= "</div>";
					$pictures_html .= $image . $description;
				}
		echo $pictures_html;
	?>
</section>


