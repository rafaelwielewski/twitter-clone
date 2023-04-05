<?php

namespace App\Infra\Controller;

use DomainException;
use Exception;

class Handler implements Controller {

    public function __construct(
        private Controller $controller
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        try {
            return $this->controller->handle($httpRequest);
        } catch (DomainException $ide) {
            return $this->handle400HTTP($ide->getMessage());
        } catch (Exception $ide) {
            return $this->handle500HTTP($ide->getMessage());
        }
    }

    private function handle400HTTP($message): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_INVALID_DATA, [
            'message' => $message
        ]);
    }

    private function handle412HTTP($message): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_PRE_CONDITION_FAILED, [
            'message' => $message
        ]);
    }

    private function handle403HTTP($message): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_ACCESS_DENIED, [
            'message' => $message
        ]);
    }

    private function handle404HTTP($message): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_NOT_FOUND_CODE, [
            'message' => $message
        ]);
    }

    public function handle401HTTP(): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_ACCESS_FORBIDEN, [
            'message' => 'Access forbidden'
        ]);
    }

    private function handle500HTTP($message): HttpResponse
    {
        return new HttpResponse(HttpResponse::HTTP_INTERNAL_ERROR_CODE, [
            'message' => $message
        ]);
    }
    
}