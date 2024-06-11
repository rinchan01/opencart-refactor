<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Repositories\AddressRepository;

class AddressRepositoryImpl implements AddressRepository{
    public function save(array $data) {
        $address = new Address();
        $address->fill($data);
        $address->save();
        return Address::all();
    }
    public function update(array $data, int $id) {
        $address = Address::find($id);
        if ($address) {
            $address->fill($data);
            $address->save();
        }
        return Address::all();
    }
    public function find(int $id)
    {
        return Address::where('id', $id)->firstOrFail();
    }
    public function delete(int $id) {
        $address = Address::find($id);
        if ($address) {
            $address->delete();
        }
        return Address::all();
    }
    public function findByCustomer(int $customerId) {
        return Address::where('customer_id', $customerId)->get();
    }
    public function all() {
        return Address::all();
    }
    public function countByCustomerId(int $customerId) {
        return Address::where('customer_id', $customerId)->count();
    }
    // TODO: check if the address is in subscriptions
}
