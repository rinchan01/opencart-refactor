<?php
namespace App\Repositories;
use App\Models\User;

interface UserRepository
{
    public function save(array $data): User;
    public function update(array $data, int $id): User;
    public function delete(int $id);
    public function find(int $id): ?User;
    public function findByEmail(string $email): ?User;
    public function findByUsername(string $username): ?User;
    public function all();
}
