<?php

declare (strict_types = 1);

namespace SimpleApi\Controllers;

use Pecee\Http\Request;
use Pecee\Http\Response;
use SimpleApi\Services\WelcomeService;

class WelcomeController
{
    public function __construct(private readonly WelcomeService $service)
    {}

    public function index(Response $response)
    {
        $response->json($this->service->getAllWelcome());
    }

    public function show(int $id, Response $response)
    {
        $response->json($this->service->findById($id));
    }

    public function store(Request $request, Response $response)
    {
        $payload = $request->getInputHandler()->getOriginalPost();
        $saved = $this->service->create($payload);
        $response->httpCode(201)->json($saved);
    }
}
