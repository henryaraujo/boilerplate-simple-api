<?php

declare (strict_types = 1);

namespace SimpleApi\Services;

use SimpleApi\Repositories\WelcomeRepository;

class WelcomeService
{
    private array $fake;
    public function __construct(private readonly WelcomeRepository $repository)
    {
        $this->fake = [
            [
                'id' => 1,
                'name' => 'welcome',
            ],
            [
                'id' => 2,
                'name' => 'welcome 02',
            ],
        ];
    }

    public function getAllWelcome(): array
    {
        return $this->fake;
    }

    public function findById(int $id)
    {
        return array_filter($this->fake, fn($fake) => $fake['id'] == $id);
    }

    public function create(array $payload)
    {
        return array_merge($this->fake, [$payload]);
    }
}
