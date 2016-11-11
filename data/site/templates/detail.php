<?php require_once("templates/default/header.php") ?>
<?php require_once("templates/default/navigation.php") ?>
<section class="section">
    <d>
        <img src="/<?php echo $options['path'] ?>" class="wrap align-left" />
        <aside class="aside_right">
            <p>Title: <?php echo $options['title'] ?></p>
            <p>Price: <?php echo $options['price'] ?></p>
        </aside>
    </d>
    <article class="OptSize">
        <p>Bildgrössenauswahl</p>
        <article class="MetaData">"Meta data"</article>
    </article>
</section>
<?php require_once("templates/default/footer.php") ?>