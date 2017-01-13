<?php

function resize_image($path, $new_path) {

	$x = getimagesize($path);
	$width  = $x['0'];
	$height = $x['1'];
	$rs_width  = 300;
	$rs_height = 300;
	$percentage = 300 * 100 / (($width > $height) ? $width : $height);
	if($width > $height)
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
	echo "new path: $new_path  ". $path_info['extension'];
	switch ($path_info['extension']) {
		case "gif":
		case "GIF":
			return imagegif($img_base, "./gallery/thumbnails/".basename($path));
			break;
		case "JPEG":
		case "jpeg":
		case "JPG":
		case "jpg":
			return imagejpeg($img_base, "./gallery/thumbnails/".basename($path));
			break;
		case "png":
		case "PNG":
			return imagepng($img_base, "./gallery/thumbnails/".basename($path));
			break;
		default :
			break;
	}
}