<?php


namespace App\Exceptions;


class ModelNotFoundException extends BaseException
{
    public function __construct(string $message = 'Model not found', int $http_status_code = 400, int $error_code = 1)
    {
        $this->message = $message;
        $this->http_status_code = $http_status_code;
        $this->error_code = $error_code;
    }
}