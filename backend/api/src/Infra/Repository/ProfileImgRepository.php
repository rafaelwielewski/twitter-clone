<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ProfileImgRepositoryContract;
use App\Domain\Entity\User;
use App\Infra\Database\DB;

class ProfileImgRepository implements ProfileImgRepositoryContract {

    public function __construct(private DB $db)
    {}

	public function setPhoto(User $profile)
	{

	$profileImg = $profile->getProfileImg();
	$profileIduser = $profile->getIduser();


	$image = imagecreatefrompng($profileImg["tmp_name"]);

	$dist = dirname( $_SERVER['DOCUMENT_ROOT'], 1 ) . DIRECTORY_SEPARATOR .
	"Frontend" . DIRECTORY_SEPARATOR .
	"Twitter-clean-code" . DIRECTORY_SEPARATOR .  
	"res" . DIRECTORY_SEPARATOR . 
	"site" . DIRECTORY_SEPARATOR . 
	"img" . DIRECTORY_SEPARATOR . 
	"profile" . DIRECTORY_SEPARATOR . 
	$profileIduser . ".jpg";

	imagejpeg($image, $dist);

	imagedestroy($image);

	$url = "res" . DIRECTORY_SEPARATOR . 
	"site" . DIRECTORY_SEPARATOR . 
	"img" . DIRECTORY_SEPARATOR . 
	"profile" . DIRECTORY_SEPARATOR . 
	$profileIduser . ".jpg";

	$sql = 'UPDATE tb_users SET profileImg = :fileurl  WHERE iduser = :profileIduser';
		$this->db->execute($sql, [
			'fileurl' => $url,
			'profileIduser' => $profileIduser,
		]);

}
}
