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
		default:
			die("Crap, could not find out image type");
	}

	$img_base = imagecreatetruecolor($rs_width, $rs_height);
	imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

	$image_type = image_type($path);
	$image_path = "./gallery/thumbnails/" . basename($path);

	if ($image_type === "gif") return imagegif($img_base, $image_path);
	if ($image_type === "jpg") return imagejpeg($img_base, $image_path);
	if ($image_type === "png") return imagepng($img_base, $image_path);
	throw new Exception("Wrong image type");
}

function watermark($path) {
	// Load the stamp and the photo to apply the watermark to
	$full_path = __DIR__ . '/../assets/logo/logo_isithombe.png';
	$path = __DIR__ . "/../$path";
	$stamp = imagecreatefrompng($full_path);
	$image_type = image_type($path);
	if ($image_type === "gif"){
		$im = imagecreatefromgif($path);
		resize_and_copy_stamp($im, $stamp, $path);
		imagegif($im, $path);
	} elseif
	($image_type === "jpg"){
		$im = imagecreatefromjpeg($path);
		resize_and_copy_stamp($im, $stamp, $path);
		imagejpeg($im, $path);
	}elseif ($image_type === "png"){
		$im = imagecreatefrompng($path);
		resize_and_copy_stamp($im, $stamp, $path);
		imagepng($im, $path);
	}else
		die("Wrong file type passed");
}

function resize_and_copy_stamp($image, $stamp, $path){
	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Copy the stamp image onto our photo using the margin offsets and the photo
	// width to calculate positioning of the stamp.
	$copied = imagecopy($image, $stamp,
		imagesx($image) - $sx - $marge_right,
		imagesy($image) - $sy - $marge_bottom,
		0, 0,
		imagesx($stamp),
		imagesy($stamp));

	if (file_exists($path) && $copied) unlink($path); // we have to unlink the image first, otherwise the resource is in use
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
			throw new Exception("Could not detect image type");
			break;
	}
}