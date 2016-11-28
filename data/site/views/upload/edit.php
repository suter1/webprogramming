<?php require_once("views/default/header.php") ?>
<?php require_once("views/default/navigation.php") ?>
	<section class="section">
		<div class="eqWrap">
			<div class="eq equalHW">
				<label for="camera_model">Camera Model</label>
				<input type="text" name="camera_model" id="camera_model" value="<?php echo $options['camera_model'] ?>" /><br />
				<label for="aperture">Aperture</label>
				<input type="text" name="aperture" id="aperture" value="<?php echo $options['aperture'] ?>" /><br />
				<label for="exposure_time">Exposure Time</label>
				<input type="text" name="exposure_time" id="exposure_time" value="<?php echo $options['exposure_time'] ?>" /><br />
				<label for="title">Title</label>
				<input type="text" name="title" id="title" value="<?php echo $options['title'] ?>" /><br />
				<input type="hidden" name="id" id="id" value="<?php echo $options['id'] ?>" /><br />
				<button onclick="updateImage();">Update</button>
			</div>
			<div class="eq equalHW">
				<img src="/<?php echo $options['thumbnail_path'] ?>" />
			</div>
		</div>
	</section>
<?php require_once("views/default/footer.php") ?>