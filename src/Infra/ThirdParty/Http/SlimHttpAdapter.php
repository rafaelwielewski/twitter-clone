<?php

namespace App\Infra\ThirdParty\Http;

use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SlimHttpAdapter implements Http {
    
    public function __construct(private $app)
    {}

    public function getHandleFunction($controllerFactory, $path, $middlewares) 
    {
        return function (Request $request, Response $response, $args) use ($controllerFactory, $path, $middlewares) {
            $httpRequest = new HttpRequest(json_decode($request->getBody(), true), $request->getQueryParams(), $request->getHeaders(), $path, $args);
            try {
                foreach ($middlewares as $middleware) {
                    $middleware->execute($httpRequest);
                }
                $controller = $controllerFactory::getController();
                $httpResponse = $controller->handle($httpRequest);
            } catch (Exception $e) {
                $httpResponse = new HttpResponse(HttpResponse::HTTP_ACCESS_FORBIDEN, ['message' => 'Unauthorized']);
            }

            $response->getBody()->write(json_encode($httpResponse->body));
            $newResponse = $response
                            ->withStatus($httpResponse->statusCode)
                            ->withHeader('Content-Type', 'Application/json');

            return $newResponse;
        };
    }

    public function on(string $method, string $path, ControllerFactoryContract $controllerFactory, array $middlewares = [])
    {
        $this->app->{$method}($path, $this->getHandleFunction($controllerFactory, $path, $middlewares));
    }

    public function run()
    {
        $this->app->run();
    }

}