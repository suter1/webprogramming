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
					$description = "<div class='description'><span>$title</span>";
					foreach($picture->tags() as $tag){
						$description .= "<span class='badge'>" . $tag->getName() . "</span>";
					}
					$description .= "</div></div>";
					$pictures_html .= $image . $description;
				}
		echo $pictures_html;
	?>
</section>


