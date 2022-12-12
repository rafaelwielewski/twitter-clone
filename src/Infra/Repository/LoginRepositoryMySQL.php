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
        

        if (!$results) return ('Your username or password is incorrect');

        if (password_verify($login->getLoginPassword(), $results["despassword"]) === true)
		
        {
            //session_start();//tirar
           // session_regenerate_id();
		    $session['loggedin'] = TRUE;
            $session['iduser'] = $results["iduser"];
            $session['name'] = $results["desname"];
		    $session['username'] = $results["deslogin"];
            return ($session);

	    } else {
            return ('Your username or password is incorrect');
        }

    }
}
