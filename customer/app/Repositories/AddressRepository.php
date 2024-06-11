<?php

namespace App\Repositories;

interface AddressRepository
{
    public function save(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
    public function find(int $id);
    public function findByCustomer(int $customerId);
    public function all();
}
