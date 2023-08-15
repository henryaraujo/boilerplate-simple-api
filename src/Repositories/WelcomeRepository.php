<?php

declare (strict_types = 1);

namespace SimpleApi\Repositories;

use Doctrine\ORM\EntityManager;

class WelcomeRepository implements Repository
{
    public function __construct(private readonly EntityManager $em)
    {
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
    }

    public function findById(string | int $id)
    {
        /*
    #Using Doctrine
    $welcome = $this->em->find(Welcome::class, $id);
    return [
    'id' => $welcome->getId(),
    'name' => $welcome->getName()
    ];
     */
    }

    public function save(mixed $payload)
    {
        /*
    #Using Doctrine
    $welcome = new Welcome();
    $welcome->setId($payload['id'])->setName($payload['name']);
    $this->em->persist($welcome);
    $this->em->flush();

    return $welcome->toArray();
     */
    }

    public function update(string | int $id, mixed $payload)
    {
    }

    public function delete(string | int $id)
    {
    }
}
