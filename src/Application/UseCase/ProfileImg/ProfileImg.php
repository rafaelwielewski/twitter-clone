<?php

namespace App\Application\UseCase\ProfileImg;

use App\Domain\Contract\ProfileImgRepositoryContract;


Class ProfileImg {

    public function __construct(private ProfileImgRepositoryContract $ProfileImgRepositoryContract)
    {}


    public function execute(){
        
        $this->ProfileImgRepositoryContract->setPhoto();

    }

}
?>