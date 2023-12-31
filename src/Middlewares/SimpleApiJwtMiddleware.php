<?php

declare (strict_types = 1);

namespace SimpleApi\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Pecee\Http\Response;
use SimpleApi\Core\SimpleApiJwt;

class SimpleApiJwtMiddleware implements IMiddleware
{
    public function __construct(private readonly SimpleApiJwt $jwt)
    {}

    public function handle(Request $request): void
    {
        $response = new Response($request);
        $token = $request->getHeader('Authorization');
        list(, $token) = explode("Bearer ", $token);

        if (empty($token)) {
            $response->httpCode(403)->json(['message' => 'invalid token']);
        }

        if (!$this->jwt->validation($token)) {
            $response->httpCode(401)->json(['message' => 'invalid token']);
        }
    }
}
