<?php

namespace App\Containers\AppSection\Authentication\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class OAuthException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_INTERNAL_SERVER_ERROR, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authentication::exceptions.oauth');
        parent::__construct($message, $code, $previous);
    }
}
