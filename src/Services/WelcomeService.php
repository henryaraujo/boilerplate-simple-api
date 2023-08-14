<?php

namespace SimpleApi\Services;

use Doctrine\ORM\EntityManager;
use SimpleApi\Entities\Welcome;

class WelcomeService
{
	private array $fake;
	public function __construct(private readonly EntityManager $em)
    {
    	$this->fake = [
			[
				'id' => 1,
				'name' => 'welcome'
			],
			[
				'id' => 2,
				'name' => 'welcome 02'
			]
		];
    }

    public function find()
	{
		/*
			#Using Doctrine
			$query = $this->em->createQueryBuilder()
			->select('w')
			->from(Welcome::class, 'w')
			->getQuery();
			return $query->getArrayResult();
		*/
		return $this->fake;
	}

	public function findById(int $id)
	{
		/*
			#Using Doctrine
			$welcome = $this->em->find(Welcome::class, $id);
			return [
				'id' => $welcome->getId(),
				'name' => $welcome->getName()
			];
		*/
		return array_filter($this->fake, fn($fake) => $fake['id'] == $id);
	}
	
	public function create(array $payload)
	{
		return array_merge($this->fake, [$payload]);
		/*
			#Using Doctrine
			$welcome = new Welcome();
			$welcome->setId($payload['id'])->setName($payload['name']);
			$this->em->persist($welcome);
			$this->em->flush();
		
			return $welcome->toArray();
		*/
	}
}