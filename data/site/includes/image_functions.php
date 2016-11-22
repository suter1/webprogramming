<?php

function resize_image($path) {

	$x = getimagesize($path);
	$width  = $x['0'];
	$height = $x['1'];

	$rs_width  = 300;//resize to half of the original width.
	$rs_height = 300;//resize to half of the original height.

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
			return imagegif($img_base, $path);
			break;
		case "jpeg":
			return imagejpeg($img_base, $path);
			break;
		case "png":
			return imagepng($img_base, $path);
			break;
	}
}