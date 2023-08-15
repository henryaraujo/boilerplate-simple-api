<?php

declare (strict_types = 1);

namespace SimpleApi\Controllers;

use Pecee\Http\Request;
use Pecee\Http\Response;
use SimpleApi\Services\AuthService;

class AuthController
{
    public function __construct(private readonly AuthService $service)
    {}

    public function signin(Request $request, Response $response)
    {
        $jwt = $this->service->createJwt();
        $response->json(['signin' => 'signin was successful!', 'token' => $jwt]);
    }
}
