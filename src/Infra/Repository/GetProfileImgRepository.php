<?php

namespace App\Infra\Repository;

use App\Domain\Contract\GetProfileImgRepositoryContract;

class GetProfileImgRepository implements GetProfileImgRepositoryContract {

    public function __construct()
    {
		
	}

    public function checkPhoto($profileIduser)
{
	if (file_exists(
		$_SERVER['DOCUMENT_ROOT'], 1 ) . DIRECTORY_SEPARATOR .
		"Frontend" . DIRECTORY_SEPARATOR .
		"Twitter-clean-code" . DIRECTORY_SEPARATOR .  
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR . 
		"img" . DIRECTORY_SEPARATOR . 
		"profile" . DIRECTORY_SEPARATOR . 
		$profileIduser . ".jpg"
		
		) {

        return $file = "/res/site/img/profile/" . $profileIduser . ".jpg";
		
	} else {

		return $file = "/res/site/img/profile.jpg";

	}
	
		

}
 
}
