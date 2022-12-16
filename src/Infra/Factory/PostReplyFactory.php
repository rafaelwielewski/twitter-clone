<?php

namespace App\Infra\Factory;

use App\Application\UseCase\PostReply\PostReply;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Tweet\PostReplyController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\PostReplyRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class PostReplyFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new PostReplyController(
                new PostReply(
                    new PostReplyRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}