<?php

namespace App\Infra\Repository;

use App\Domain\Contract\LoginRepositoryContract;
use App\Domain\Entity\UserLogin;
use App\Infra\Database\DB;
use DomainException;
class LoginRepositoryMySQL implements LoginRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function save(UserLogin $login)
    {
        $sql = 'SELECT * FROM tb_users WHERE (deslogin) = (:username)';
        $results = $this->db->findOne($sql, [
            'username' => $login->getLoginUsername(),
        ]);
        

        if (!$results) throw new DomainException('Your username or password is incorrect');

        if (password_verify($login->getLoginPassword(), $results["despassword"]) === true)
		
        {
            session_start();//tirar
            session_regenerate_id();
		    $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $results["desname"];
		    $_SESSION['username'] = $results["deslogin"];
		    $_SESSION['password'] = $results["despassword"];
            var_dump($_SESSION);
	    } else {
            throw new DomainException('Your username or password is incorrect');
        }

    }
}
