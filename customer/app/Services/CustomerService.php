<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function list()
    {
        return $this->customerRepository->all();
    }
    public function find($id)
    {
        return $this->customerRepository->find($id);
    }
    public function save(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->customerRepository->save($data);
    }
    public function update(array $data)
    {
        try {
            $customer = $this->customerRepository->find($data['id']);
            if (!$customer) {
                throw new \Exception('Customer not found');
            }
            return $this->customerRepository->update($data, $data['id']);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function delete($id)
    {
        try {
            $customer = $this->customerRepository->find($id);
            if (!$customer) {
                throw new \Exception('Customer not found');
            }
            return $this->customerRepository->delete($id);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
