<?php require_once("templates/default/header.php") ?>
<?php require_once("templates/default/navigation.php") ?>
<section class="section">
    <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="upload" />
        <input type="submit" value="Upload File" />
    </form>
</section>
<?php require_once("templates/default/footer.php") ?>