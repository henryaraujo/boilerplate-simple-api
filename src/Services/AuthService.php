<?php

declare (strict_types = 1);

namespace SimpleApi\Services;

use SimpleApi\Core\SimpleApiJwt;

class AuthService
{
    public function __construct(private readonly SimpleApiJwt $jwt)
    {
    }

    public function createJwt(): string
    {
        return $this->jwt->create('welcome');
    }
}
