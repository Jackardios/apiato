<?php

namespace App\Containers\AppSection\Authorization\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class RoleNotFoundException extends Exception
{
    public function __construct(?string $message = null, ?int $code = Response::HTTP_NOT_FOUND, ?BaseException $previous = null)
    {
        $message = $message ?? __('appSection@authorization::exceptions.role-not-found');
        parent::__construct($message, $code, $previous);
    }
}
