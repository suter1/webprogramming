<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<?php require_once("views/default/flash.php") ?>

<section class="section images">
    <?php
    $pictures_html ="";

    /** @var Picture $picture
     * @var Tag $tag
     */
    if(sizeof($options['pictures']) > 0)
        foreach ($options['pictures'] as $picture)
            if(file_exists($picture->getPath())) {
                $title = $picture->getTitle();
                $image = "<div class='image'><img src='/" . $picture->getPath() . "' /> ";
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
<?php require_once("views/default/footer.php") ?>
