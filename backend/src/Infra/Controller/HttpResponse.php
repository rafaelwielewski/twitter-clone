<?php 

namespace App\Infra\Controller;

final class HttpResponse {

    CONST HTTP_SUCCESS_CODE = 200;
    CONST HTTP_ACCEPTED_BUT_PROCESSING_CODE = 202;
    CONST HTTP_INVALID_DATA = 400;
    CONST HTTP_ACCESS_FORBIDEN = 401;
    CONST HTTP_ACCESS_DENIED = 403;
    CONST HTTP_NOT_FOUND_CODE = 404;
    CONST HTTP_PRE_CONDITION_FAILED = 412;
    CONST HTTP_INTERNAL_ERROR_CODE = 500;

    public function __construct(public int $statusCode, public $body, public string | null $templateName = null) 
    {}

}