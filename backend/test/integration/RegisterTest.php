<?php
namespace Tests;

use App\Application\UseCase\Register\Register;
use App\Application\UseCase\Register\RegisterInput;
use App\Infra\Database\MySQL;
use App\Infra\Repository\RegisterRepositoryMySQL;
use App\Infra\ThirdParty\Env\PhpDotEnvAdapter;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase {

    public function testShallPostTweet()
    {
        PhpDotEnvAdapter::load(__DIR__ . '/../../');

        $mysql = $this->createMock(MySQL::class);
        $mysql->method('execute');
        //$mysql = new MySQL();

        $register = new Register(
            new RegisterRepositoryMySQL($mysql)
        );

        $input = new RegisterInput();
        $input->nameRegister = 'Rafael 123';
        $input->usernameRegister = 'rafael';
        $input->passwordRegister = 'Rafa12345';

        $this->assertEmpty($register->execute($input));
    }

}