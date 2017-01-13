<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
	<section class="section">
		<div class="eqWrap">
			<div class="eq equalHW">
				<label for="camera_model"><?php echo $options['lang_camera_model'] ?></label>
				<input type="text" name="camera_model" id="camera_model" value="<?php echo $options['camera_model'] ?>" /><br />
				<label for="aperture"><?php echo $options['lang_aperture'] ?></label>
				<input type="text" name="aperture" id="aperture" value="<?php echo $options['aperture'] ?>" /><br />
				<label for="exposure_time"><?php echo $options['lang_exposure_time'] ?></label>
				<input type="text" name="exposure_time" id="exposure_time" value="<?php echo $options['exposure_time'] ?>" /><br />
				<label for="title"><?php echo $options['lang_title'] ?></label>
				<input type="text" name="title" id="title" value="<?php echo $options['title'] ?>" /><br />
                <label for="price"><?php echo $options['lang_price'] ?> (CHF)</label>
                <input type="number" name="price" id="price" step="0.1" min="1" value="<?php echo $options['price'] ?>"/><br />
                <input type="hidden" name="id" id="id" value="<?php echo $options['id'] ?>" /><br />
                <label for="myTags">Tags</label>
                <input id="myTags" type="text" name="tags" value="<?php echo $options['tags']?>" />
				<button onclick="updateImage();">Update</button>
			</div>
			<div class="eq equalHW">
				<img src="/<?php echo $options['thumbnail_path'] ?>" />
			</div>
		</div>
	</section>
<?php require_once("views/default/footer.php") ?>