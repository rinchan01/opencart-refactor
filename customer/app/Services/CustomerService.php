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
    public function findByEmail($email)
    {
        return $this->customerRepository->findByEmail($email);
    }
    public function save(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->customerRepository->save($data);
    }
    public function update(array $data)
    {
        try {
            $customer = $this->customerRepository->findByEmail($data['email']);
            if (!$customer) {
                throw new \Exception('Customer not found');
            }
            return $this->customerRepository->update($data, $data['email']);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function delete($email)
    {
        try {
            $customer = $this->customerRepository->findByEmail($email);
            if (!$customer) {
                throw new \Exception('Customer not found');
            }
            return $this->customerRepository->delete($email);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
