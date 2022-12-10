<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ProfileImgRepositoryContract;


class ProfileImgRepository implements ProfileImgRepositoryContract {

    public function __construct()
    {
		
	}

public function setPhoto()
{
	var_dump($_FILES);
	$extension = explode('.', $_FILES["file"]['name']);
	$extension = end($extension);

	switch ($extension) {

		case "jpg":
		case "jpeg":
		$image = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
		break;

		case "gif":
		$image = imagecreatefromgif($_FILES["file"]["tmp_name"]);
		break;

		case "png":
		$image = imagecreatefrompng($_FILES["file"]["tmp_name"]);
		break;

	}

	$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR . 
		"img" . DIRECTORY_SEPARATOR . 
		"profile" . DIRECTORY_SEPARATOR . 
		$_POST['username'] . ".jpg";

	imagejpeg($image, $dist);

	imagedestroy($image);

}
}
