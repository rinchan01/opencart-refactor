<?php

namespace App\Services;

use App\Repositories\AddressRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddressService {
    protected $addressRepository;
    public function __construct(AddressRepository $addressRepository) {
        $this->addressRepository = $addressRepository;
    }
    public function list($id) {
        return $this->addressRepository->findByCustomer($id);
    }
    public function find($id) {
        return $this->addressRepository->find($id);
    }
    public function save(array $data)
    {
        $address = $this->find($data['address_id']);
        if ($address) {
            return $this->addressRepository->save($data, $data['address_id']);
        }
        throw new ModelNotFoundException('Address not found.');
    }
    public function update(array $data) {
        $address = $this->find($data['address_id']);
        if (!$address) {
            throw new ModelNotFoundException('Address not found.');
        }
        return $this->addressRepository->update($data, $data['address_id']);
    }
    public function delete($id) {
        $address = $this->find($id);
        if (!$address) {
            throw new ModelNotFoundException('Address not found.');
        }
        // TODO: check if the address is in subcriptions

        return $this->addressRepository->delete($id);
    }
}
