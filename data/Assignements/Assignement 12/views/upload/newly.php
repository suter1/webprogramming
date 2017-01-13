<?php require_once("views/default/default_header.php"); ?>

    <section class="section">
    <form action="/upload" method="post" name="upload" id="upload" enctype="multipart/form-data">
        <input type="file" name="upload" required/>
        <button onclick="upload_confirm(); return false;">Upload File</button>
    </form>
    <div id="dialog-confirm" style="display: none" title="Copyright">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
            <?php echo $options['copyright'] ?></p>
    </div>
</section>
<?php require_once("views/default/footer.php") ?>