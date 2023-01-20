<?php
namespace App\Domain\Contract;

use App\Domain\Entity\UserLogin;

interface LoginRepositoryContract {
    public function save(UserLogin $login);
}