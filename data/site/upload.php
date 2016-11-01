<?php
/**
 * Created by PhpStorm.
 * User: maestro7
 * Date: 18.10.2016
 * Time: 19:47
 */
require_once('models/picture.php');
if (isset($_FILES['upload'])) {
	$path = "gallery/";
	$file = $_FILES['upload'];
	if ($file['error'] != 0) {
		echo "There was an error uploading the file \n";
		echo $file['error'];
        echo var_dump($file);
		exit;
	}
	$filename = $_FILES['upload']['name'];
	$filetype = $_FILES['upload']['type'];
	$fileTemp = $_FILES['upload']['tmp_name'];
	$allowed = array('tif', 'tiff', 'jpg', 'jpeg', 'JPG');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if (!in_array($ext, $allowed)) {
		echo "This file type is not allowed to upload to this site.";
		exit;
	}

	do {
		$pickFileName = md5(uniqid(rand())) . $ext;
	} while (file_exists($path.$pickFileName));
    chmod($fileTemp, 0700);

    $current_file = $path.$pickFileName;
	move_uploaded_file($fileTemp, $current_file);

    $exif = @exif_read_data($current_file);

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

    $image = Picture::create([
            'camera_model' => $ecameraModel,
            'aperture' => $eaperture,
            'exposure_time' => $eexposureTime,
            'created_at' => $edate,
            'uploaded_at' => date('Y-m-d H:i:s'),
            'path' => $path . $pickFileName,
            'owner_id' => 1,
            'width' => $ewidth,
            'height' => $eheight,
            'title' => 'whatever',
            'id' => null]);
}