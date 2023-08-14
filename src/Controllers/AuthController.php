<?php

namespace SimpleApi\Controllers;

use SimpleApi\Services\AuthService;
use Pecee\Http\Request;
use Pecee\Http\Response;

class AuthController
{
	public function __construct(private readonly AuthService $service){}

	public function signin(Request $request, Response $response)
	{
		$jwt = $this->service->createJwt();
		$response->json(['signin' => 'signin was successful!', 'token' => $jwt]);
	}
}