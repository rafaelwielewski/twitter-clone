<?php

namespace App\Infra\Controller\Home;

use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class HomeController {


    function login($request, $response, $args){
        $post = json_decode(file_get_contents('php://input'), true);
        echo json_encode($post);

        return $response;
    }

}