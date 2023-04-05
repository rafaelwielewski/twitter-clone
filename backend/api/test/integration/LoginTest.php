<?php
namespace Tests;

use App\Application\UseCase\Login\Login;
use App\Application\UseCase\Login\LoginInput;
use App\Infra\Database\MySQL;
use App\Infra\Repository\LoginRepositoryMySQL;
use App\Infra\ThirdParty\Env\PhpDotEnvAdapter;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {

    public function testShallPostTweet()
    {
        PhpDotEnvAdapter::load(__DIR__ . '/../../');

        //$mysql = $this->createMock(MySQL::class);
        //$mysql->method('execute');
        $mysql = new MySQL();

        $login = new Login(
            new LoginRepositoryMySQL($mysql)
        );

        $input = new LoginInput();
        $input->usernameLogin = 'rafael';
        $input->passwordLogin = 'Rafa12345';

        $this->assertEmpty($login->execute($input));
        fwrite(STDERR, print_r($_SESSION, true));
    }

}