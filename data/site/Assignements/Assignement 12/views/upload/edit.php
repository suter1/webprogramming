<?php require_once("views/default/default_header.php"); ?>

    <section class="section">
		<div class="eqWrap">
			<div class="eq equalHW">
				<table>
					<tr>
						<td><label for="title"><?php echo $options['lang_title'] ?></label></td>
						<td><input type="text" name="title" id="title" value="<?php echo $options['title'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="camera_model"><?php echo $options['lang_camera_model'] ?></label></td>
						<td><input type="text" name="camera_model" id="camera_model" value="<?php echo $options['camera_model'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="lens"><?php echo $options['lang_lens'] ?></label></td>
						<td><input type="text" name="lens" id="lens" value="<?php echo $options['lens'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="aperture"><?php echo $options['lang_aperture'] ?></label></td>
						<td><input type="text" name="aperture" id="aperture" value="<?php echo $options['aperture'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="exposure_time"><?php echo $options['lang_exposure_time'] ?></label></td>
						<td><input type="text" name="exposure_time" id="exposure_time" value="<?php echo $options['exposure_time'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="created_at"><?php echo $options['lang_created_at'] ?></label></td>
						<td><input type="text" name="created_at" id="created_at" value="<?php echo $options['created_at'] ?>" /><br /></td>
					</tr>
					<tr>
						<td><label for="price"><?php echo $options['lang_price'] ?> (CHF)</label></td>
						<td><input type="number" name="price" id="price" step="0.1" min="1.0" value="<?php echo $options['price'] ?>"/><br /></td>
					</tr>
					<tr>
						<td><label for="myTags">Tags</label></td>
						<td><input id="myTags" type="text" name="tags" value="<?php echo $options['tags']?>" /></td>
					</tr>
					<tr>
						<td><label for="description"><?php echo $options['lang_description'] ?></label></td>
						<td><input type="text" name="description" id="description" value="<?php echo $options['description'] ?>"/><br /></td>
					</tr>
				</table>
                <input type="hidden" name="id" id="id" value="<?php echo $options['id'] ?>" /><br />
				<button onclick="updateImage();">Update</button>
			</div>
			<div class="eq equalHW">
				<img src="/<?php echo $options['thumbnail_path'] ?>" />
			</div>
		</div>
	</section>
<?php require_once("views/default/footer.php") ?>