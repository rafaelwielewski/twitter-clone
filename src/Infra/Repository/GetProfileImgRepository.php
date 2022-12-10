<?php

namespace App\Infra\Repository;

use App\Domain\Contract\GetProfileImgRepositoryContract;

class GetProfileImgRepository implements GetProfileImgRepositoryContract {

    public function __construct()
    {
		
	}

    public function checkPhoto($username)
{
	if (file_exists(
		$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR . 
		"img" . DIRECTORY_SEPARATOR . 
		"profile" . DIRECTORY_SEPARATOR . 
        $username . ".jpg"
		)) {

        return $file = "/res/site/img/profile/" . $username . ".jpg";
		
	} else {

		return $file = "/res/site/img/profile.jpg";

	}
	
		

}
 
}
