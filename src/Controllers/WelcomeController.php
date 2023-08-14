<?php

namespace SimpleApi\Controllers;

use SimpleApi\Services\WelcomeService;
use Pecee\Http\Request;
use Pecee\Http\Response;

class WelcomeController
{
	public function __construct(private readonly WelcomeService $service){}
	
	public function index(Response $response)
	{
		$response->json($this->service->find());
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