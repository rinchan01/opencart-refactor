<?php

namespace App\Repositories;

use App\Models\Customer;

interface CustomerRepository
{
    public function save(array $customer);
    public function update(array $data, string $email);
    public function delete($email);
    public function findByEmail($email);
    public function all();
}
