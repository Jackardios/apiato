<?php

namespace App\Containers\AppSection\Authentication\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class UserNotConfirmedException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_CONFLICT, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authentication::exceptions.user-not-confirmed');
        parent::__construct($message, $code, $previous);
    }
}
