<?php

namespace App\Infra\Repository;

use App\Domain\Contract\RegisterRepositoryContract;
use App\Domain\Entity\UserRegister;
use App\Infra\Database\DB;

class RegisterRepositoryMySQL implements RegisterRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function save(UserRegister $register)
    {
        $sql = 'INSERT INTO tb_users (desname, deslogin, despassword, dtregister) VALUES (:name, :username, :password, :date)';
        $this->db->execute($sql, [
            'name' => $register->getRegisterName(),
            'username' => $register->getRegisterUsername(),
            'password' => password_hash($register->getRegisterPassword(), PASSWORD_DEFAULT, ['cost'=>12]),
            'date' => $register->getDate()
        ]);
    }
}
