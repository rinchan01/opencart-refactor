<?php

namespace App\Repositories;

use App\Repositories\CustomerRepository;
use App\Models\Customer;

class CustomerRepositoryImpl implements CustomerRepository
{
    public function save(array $data) {
        $customer = new Customer();
        $customer->fill($data);
        $customer->save();
        return Customer::all();
    }
    public function findByEmail($email)
    {
        return Customer::where('email', $email)->firstOrFail();
    }
    public function update(array $data, string $email) {
        $customer = $this->findByEmail($email);
        if ($customer) {
            $customer->fill($data);
            $customer->save();
        }
        return Customer::all();
    }
    public function delete($email) {
        $customer = $this->findByEmail($email);
        if ($customer) {
            $customer->delete();
        }
        return Customer::all();
    }
    public function all() {
        return Customer::all();
    }

}
