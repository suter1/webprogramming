<?php require_once("views/default/default_header.php"); ?>

<?php require_once 'autoload.php'; ?>
    <section class="section">
        <div>
            <img src="/<?php echo $options['path'] ?>" class="wrap align-left"/>
            <aside class="aside_right">
                <p class="title"><?php echo $options['title'] ?></p>
	            <table>
		            <tr>
			            <th><label for="price"><?php echo $options['lang_price'] ?>:</label></th>
			            <th>CHF <?php echo $options['price'] ?></th>
		            </tr>
	            </table>
            </aside>
        </div>
        <article class="OptSize">
            <p>Bildgrössenauswahl</p>
        </article>
        <div style="width: 200px;">
			<?php
			$picture_id = $options['id'];
			echo "<input type='hidden' name='picture_id' id='picture_id' value='$picture_id'/>";
			if (!is_null(current_user()) && $options['owner_id'] === current_user()->getId() ||
                (!is_null(current_user()) && current_user()->isAdmin())) {
				$loc_edit = Localization::find_by(["qualifier" => 'edit', 'lang' => get_language()]);
				echo "<button onclick='editPicture()'>" . $loc_edit->getValue() . "</button>";
				echo "<button onclick='deletePicture()'>". $options['lang_delete_picture'] . "</button>";
			}
			if ((!is_null(current_user()) && $options['owner_id'] !== current_user()->getId())) {
				echo "<button onclick='addToBasket()'>" . "<i class='fa fa-shopping-basket' aria-hidden='false'></i>" . " " . $options['buy'] . "</button>";
			}
			?>
	        <article class="MetaData">
		        <table width="350">
			        <tr>
				        <td><label for="title"><?php echo $options['lang_title'] ?></label></td>
				        <td><?php echo $options['title'] ?></td>
			        </tr>
			        <tr>
				        <td><label for="description"><?php echo $options['lang_description'] ?></label></td>
				        <td><?php echo $options['description'] ?></td>
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
			        <tr>
				        <td><label for="owner"><?php echo $options['lang_owner'] ?></label></td>
				        <td><?php echo $options['owner']->getUsername() ?></td>
			        </tr>
		        </table>
	        </article>
            <input type="hidden" id="added_picture" value="<?php echo $options['lang_added_picture'] ?>" />
        </div>
    </section>
<?php require_once("views/default/footer.php") ?>