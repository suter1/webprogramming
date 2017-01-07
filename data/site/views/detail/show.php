<?php require_once("views/default/default_header.php"); ?>

<?php require_once 'autoload.php'; ?>
    <section class="section">
        <div>
            <img src="/<?php echo $options['path'] ?>" class="wrap align-left"/>
            <aside class="aside_right">
                <p class="title">Title: <?php echo $options['title'] ?></p>
                <p>CHF <?php echo $options['price'] ?></p>
	            <article class="MetaData">
		            <table>
			            <tr>
				            <td><label for="title"><?php echo $options['lang_title'] ?></label></td>
				            <td><?php echo $options['title'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="camera_model"><?php echo $options['lang_camera_model'] ?></label></td>
				            <td><?php echo $options['camera_model'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="lens"><?php echo $options['lang_lens'] ?></label></td>
				            <td><?php echo $options['lens'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="aperture"><?php echo $options['lang_aperture'] ?></label></td>
				            <td><?php echo $options['aperture'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="exposure_time"><?php echo $options['lang_exposure_time'] ?></label></td>
				            <td><?php echo $options['exposure_time'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="size"><?php echo $options['lang_size'] ?></label></td>
				            <td><?php echo $options['size'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="created_at"><?php echo $options['lang_created_at'] ?></label></td>
				            <td><?php echo $options['created_at'] ?></td>
			            </tr>
			            <tr>
				            <td><label for="uploaded_at"><?php echo $options['lang_uploaded_at'] ?></label></td>
				            <td><?php echo $options['uploaded_at'] ?></td>
			            </tr>
		            </table>
	            </article>
            </aside>
        </div>
        <article class="OptSize">
            <p>Bildgrössenauswahl</p>
        </article>
        <div style="width: 200px;">
			<?php
			$picture_id = $options['id'];
			echo "<input type='hidden' name='picture_id' id='picture_id' value='$picture_id'/>";

			if (isset($_SESSION['user_id']) && $options['owner_id'] == $_SESSION['user_id']) {
				$loc_edit = Localization::find_by(["qualifier" => 'edit', 'lang' => get_language()]);
				echo "<button onclick='editPicture()'>" . $loc_edit->getValue() . "</button>";
			}

			if (isset($_SESSION['user_id']) && $options['owner_id'] != $_SESSION['user_id']) {
				echo "<button onclick='addToBasket()'>" . "<i class='fa fa-shopping-basket' aria-hidden='false'></i>" . " " . $options['buy'] . "</button>";
			}
			?>
        </div>
    </section>
<?php require_once("views/default/footer.php") ?>