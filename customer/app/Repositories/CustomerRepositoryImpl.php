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
    public function update(array $data, int $id) {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->fill($data);
            $customer->save();
        }
        return Customer::all();
    }
    public function find(int $id)
    {
        return Customer::where('id', $id)->firstOrFail();
    }
    public function delete(int $id) {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
        }
        return Customer::all();
    }
    public function all() {
        return Customer::all();
    }
    
}
