<?php

namespace App\Repositories;

interface CustomerRepository
{
    public function save(array $data);
    public function update(array $data, string $email);
    public function delete($email);
    public function findByEmail($email);
    public function all();
}
