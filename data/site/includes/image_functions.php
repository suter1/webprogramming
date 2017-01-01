<?php

function resize_image($path, $new_path) {

	$x = getimagesize($path);
	$width = $x['0'];
	$height = $x['1'];
	$rs_width = 300;
	$rs_height = 300;
	$percentage = 300 * 100 / (($width > $height) ? $width : $height);
	if ($width > $height)
		$rs_height = $height * $percentage / 100;
	else
		$rs_width = $width * $percentage / 100;

	switch ($x['mime']) {
		case "image/gif":
			$img = imagecreatefromgif($path);
			break;
		case "image/jpeg":
			$img = imagecreatefromjpeg($path);
			break;
		case "image/png":
			$img = imagecreatefrompng($path);
			break;
	}

	$img_base = imagecreatetruecolor($rs_width, $rs_height);
	imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

	$path_info = pathinfo($path);
	switch ($path_info['extension']) {
		case "gif":
		case "GIF":
			return imagegif($img_base, "./gallery/thumbnails/" . basename($path));
			break;
		case "JPEG":
		case "jpeg":
		case "JPG":
		case "jpg":
			return imagejpeg($img_base, "./gallery/thumbnails/" . basename($path));
			break;
		case "png":
		case "PNG":
			return imagepng($img_base, "./gallery/thumbnails/" . basename($path));
			break;
		default :
			break;
	}
}

function watermark($path) {
	// Load the stamp and the photo to apply the watermark to
	$stamp = imagecreatefrompng(__DIR__ . '/../assets/logo/logo_isithombe.png');
	$image_type = image_type($path);
	if ($image_type === "gif")
		$im = imagecreatefromgif($path);
	elseif ($image_type === "jpg")
		$im = imagecreatefromjpeg($path);
	elseif ($image_type === "png")
		$im = imagecreatefrompng($path);
	else
		die("Wrong file type passed");

	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Copy the stamp image onto our photo using the margin offsets and the photo
	// width to calculate positioning of the stamp.
	imagecopy($im, $stamp,
		imagesx($im) - $sx - $marge_right,
		imagesy($im) - $sy - $marge_bottom,
		0, 0,
		imagesx($stamp),
		imagesy($stamp));

	if(file_exists($path)) unlink($path); // we have to unlink the image first, otherwise the resource is in use
	return imagepng($im, $path);

}


function image_type($path) {
	$path_info = pathinfo($path);
	switch ($path_info['extension']) {
		case "gif":
		case "GIF":
			return "gif";
			break;
		case "JPEG":
		case "jpeg":
		case "JPG":
		case "jpg":
			return "jpg";
			break;
		case "png":
		case "PNG":
			return "png";
			break;
		default :
			break;
	}
}