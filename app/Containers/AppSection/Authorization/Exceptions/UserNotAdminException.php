<?php

namespace App\Containers\AppSection\Authorization\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class UserNotAdminException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_FORBIDDEN, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authorization::exceptions.user-not-admin');
        parent::__construct($message, $code, $previous);
    }
}
