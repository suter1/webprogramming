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
        <article class="MetaData">
	        <table>
		        <tr>
			        <td><?php echo $options['lang_title'] ?></td>
			        <td><?php echo $options['title'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_camera_model'] ?></td>
			        <td><?php echo $options['camera_model'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_lens'] ?></td>
			        <td><?php echo $options['lens'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_aperture'] ?></td>
			        <td><?php echo $options['aperture'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_exposure_time'] ?></td>
			        <td><?php echo $options['exposure_time'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_width'] ?></td>
			        <td><?php echo $options['width'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_height'] ?></td>
			        <td><?php echo $options['height'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_created_at'] ?></td>
			        <td><?php echo $options['created_at'] ?></td>
		        </tr>
		        <tr>
			        <td><?php echo $options['lang_uploaded_at'] ?></td>
			        <td><?php echo $options['uploaded_at'] ?></td>
		        </tr>
	        </table>
        </article>
    </article>
</section>
<?php require_once("templates/default/footer.php") ?>