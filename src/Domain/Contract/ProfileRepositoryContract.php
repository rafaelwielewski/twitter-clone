<?php
namespace App\Domain\Contract;


use App\Domain\Entity\User;

interface ProfileRepositoryContract {
    public function getProfile(User $profile);
}