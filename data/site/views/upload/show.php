<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
<section class="section">
    <form action="/upload" method="post" name="upload" enctype="multipart/form-data">
        <input type="file" name="upload" />
        <input type="submit" value="Upload File" />
    </form>
</section>
<?php require_once("views/default/footer.php") ?>