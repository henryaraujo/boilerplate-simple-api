<?php

namespace SimpleApi\Core;

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Validation\Constraint\IssuedBy;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Constraint\ValidAt;
use Lcobucci\JWT\Validation\Validator;
use Lcobucci\Clock\SystemClock;
use DateTimeImmutable;

class SimpleApiJwt
{
	protected Configuration $jtwConfig;

	public function __construct()
	{
		$this->jtwConfig = Configuration::forSymmetricSigner(
		    new Sha256(),
		    InMemory::base64Encoded($_ENV['SECRET_KEY'])
		);
		$this->jtwConfig->setValidationConstraints(
		    new SignedWith($this->jtwConfig->signer(), $this->jtwConfig->signingKey()),
		    new ValidAt(SystemClock::fromUTC()),
		    new IssuedBy($_ENV['APP'])
		);
	}

	public function create(string $uid): string
	{
		$now = new DateTimeImmutable();
		$token = $this->jtwConfig->builder()
	    ->issuedBy($_ENV['APP'])
	    ->withClaim('uid', $uid)
	    ->issuedAt($now)
	    ->expiresAt($now->modify('+1 hour'))
	    ->getToken($this->jtwConfig->signer(), $this->jtwConfig->signingKey());
	    return $token->toString();
	}

	public function validation(string $input): bool
    {
        $token = $this->jtwConfig->parser()->parse($input);
        
        $constraints = $this->jtwConfig->validationConstraints();
        $validator = new Validator();
        
        return $validator->validate($token, ...$constraints);
    }
}