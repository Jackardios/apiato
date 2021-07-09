<?php

namespace App\Containers\AppSection\Authentication\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Exception as BaseException;
use Symfony\Component\HttpFoundation\Response;

class LoginFailedException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_BAD_REQUEST, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authentication::exceptions.login-failed');
        parent::__construct($message, $code, $previous);
    }
}
