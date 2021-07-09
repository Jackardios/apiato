<?php

namespace App\Containers\AppSection\Authentication\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class RefreshTokenMissedException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_BAD_REQUEST, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authentication::exceptions.refresh-token-missed');
        parent::__construct($message, $code, $previous);
    }
}
