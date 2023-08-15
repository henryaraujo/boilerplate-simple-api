<?php

namespace SimpleApi\Repositories;

interface Repository
{
    public function find();
    public function findById(string | int $id);
    public function save(mixed $payload);
    public function update(string | int $id, mixed $payload);
    public function delete(string | int $id);
}
