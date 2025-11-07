<?php

namespace App\Exceptions;

class ApiException extends \Exception
{

    public function __construct(string $message, int $statusCode = 400, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->code = $statusCode;
    }
}