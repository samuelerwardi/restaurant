<?php


namespace App\Exceptions;


class BaseException extends \Exception
{
    protected $message;

    protected $http_status_code;

    protected $error_code;

    public function __construct(string $message = 'error', int $http_status_code = 400, int $error_code = 1)
    {
        $this->message = $message;
        $this->http_status_code = $http_status_code;
        $this->error_code = $error_code;
    }

    public function jsonErrorResponse()
    {
        return response()->json([
            'status' => [
                'code' => $this->error_code,
                'message' => $this->message
            ]
        ], $this->http_status_code);
    }
}