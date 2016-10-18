<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 18.10.2016
 * Time: 19:47
 */
if (isset($_FILES['upload'])) {
	$path = "gallery/";
	$file = $_FILES['upload'];
	if ($file['error'] != 0) {
		echo "There was an error uploading the file \n";
		echo $file['error'];
		exit;
	}
	$filename = $_FILES['upload']['name'];
	$filetype = $_FILES['upload']['type'];
	$fileTemp = $_FILES['upload']['tmp_name'];
	$allowed = array('tif', 'tiff', 'jpg', 'jpeg');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if (!in_array($ext, $allowed)) {
		echo "This file type is not allowed to upload to this site.";
		exit;
	}

	do {
		$pickFileName = md5(uniqid(rand())) . $ext;
	} while (file_exists($path.$pickFileName));

	move_uploaded_file($pickFileName, $path);

	$exif = exif_read_data($fileTemp);

//	if (array_key_exists('Make',$exif)){
//		$ecameraMake = $exif['Make'];
//	} else {
//		$ecameraMake = "n/a";
//	}
	if (array_key_exists('Model',$exif)){
		$ecameraModel = $exif['Model'];
	} else {
		$ecameraModel = "n/a";
	}

	$efilename = $filename;
	$ewidth = $exif['COMPUTED']['Width']." pixel";
	$eheight = $exif['COMPUTED']['Height']. " pixel";

	if (array_key_exists('ApertureFNumber',$exif)){
		$eaperture = $exif['COMPUTED']['ApertureFNumber'];
	} else {
		$eaperture = "n/a";
	}
	if (array_key_exists('ExposureTime',$exif)){
		$eexposureTime = $exif['ExposureTime']." s";
	} else {
		$eexposureTime = "n/a";
	}
	if (array_key_exists('DateTimeOriginal',$exif)){
		$edate = $exif['DateTimeOriginal'];
	} else {
		$edate = "n/a";
	}
	if (array_key_exists('UndefinedTag:0xA434',$exif)){
		$elens = $exif['UndefinedTag:0xA434'];
	} else {
		$elens = "n/a";
	}

//	echo "Make: ".$ecameraMake."<br>";
	echo "Model: ".$ecameraModel."<br>";
	echo "File name: ".$filename."<br>";
	echo "Image width: ".$ewidth."<br>";
	echo "Image height: ".$eheight."<br>";
	echo "Aperture: ".$eaperture."<br>";
	echo "Exposure time: ".$eexposureTime."<br>";
	echo "Date of creation: ".$edate."<br>";
	echo "Lens: ".$elens."<br><br>";

//	var_dump($exif);

	@chmod($path, $pickFileName, 0700);
}