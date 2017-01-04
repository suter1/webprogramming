<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<?php require_once("views/default/flash.php") ?>

<section class="section images">
	<?php
	$pictures_html = "";

	/** @var Picture $picture
	 * @var Tag $tag
	 */
	if (sizeof($options['pictures']) > 0) {
		foreach ($options['pictures'] as $picture)
			if (file_exists($picture->getPath())) {
				$link_start = "<a href='/detail/" . $picture->getId() . "'>";
				$link_end = "</a>";
				$title = $picture->getTitle();
				$image = "<div class='image'><img src='" . $picture->getThumbnailPath() . "' /> ";
				$description = "<div class='description'><span class='title'>$title</span>";
				foreach ($picture->tags() as $tag) {
					$description .= "<span class='badge'>" . $tag->getName() . "</span>";
				}
				$description .= "</div></div>";
				$pictures_html .= $link_start . $image . $description . $link_end;
			}
	}else{
		$pictures_html .= $options['no_result'];
	}
	echo $pictures_html;
	?>
</section>
<?php require_once("views/default/footer.php") ?>
