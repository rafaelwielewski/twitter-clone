<?php
namespace App\Domain\Contract;

use App\Domain\Entity\UserRegister;

interface RegisterRepositoryContract {
    public function save(UserRegister $register);
}