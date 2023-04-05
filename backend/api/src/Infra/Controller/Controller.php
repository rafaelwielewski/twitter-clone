<?php 

namespace App\Infra\Controller;

interface Controller {
    public function handle(HttpRequest $httpRequest): HttpResponse;
}