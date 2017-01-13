<?php require_once("views/default/default_header.php"); ?>
<?php require_once 'autoload.php'; ?>

<section class="section images">
    <h2><?php echo $options['user'] . "'s "?><label for="pictures"><?php echo $options['lang_pictures'] ?></label> </h2>
    <?php
    $pictures_html="";
    foreach($options['pictures'] as $picture){
	    if (file_exists($picture->getPath())) {
		    $link_start = "<a href='/detail/" . $picture->getId() . "'>";
		    $link_end = "</a>";
		    $title = $picture->getTitle();
		    $image = "<div class='image'><img src='/" . $picture->getThumbnailPath() . "' /> ";
		    $description = "<div class='description'><span class='title'>$title</span>";
		    $description .= "</div></div>";
		    $pictures_html .= $link_start . $image . $description . $link_end;
	    }
    }
    if(sizeof($options['pictures'])===0) $pictures_html .= $options['no_pictures'];
    echo $pictures_html;
    ?>
</section>
<?php require_once("views/default/footer.php") ?>
