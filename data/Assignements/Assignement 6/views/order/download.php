<?php require_once("views/default/default_header.php"); ?>

<section class="section images">
    <h2>Download</h2>
    <?php
    $html = "";

    foreach($options['pictures'] as $picture){
        $html .= "<a href='/" . $picture->getPath() . "'>". $picture->getTitle() . "</a><br/>";
    }
    echo $html;
    ?>
</section>
<?php require_once("views/default/footer.php") ?>
