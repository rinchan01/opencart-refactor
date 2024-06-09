<?php
// this class is the implementation of the UserRepository interface
namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function save($data): User
    {
        $user = new User;
        $user->fill($data);
        $user->save();

        return $user;
    }
    public function find($id): ?User
    {
        return User::where('user_id', $id)->firstOrFail();
    }

    public function update($id, $data): User
    {
        $user = User::find($id);
        if ($user) {
            $user->fill($data);
            $user->save();
        }
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function findByEmail($email): ?User
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function findByUsername($username): ?User
    {
        return User::where('username', $username)->firstOrFail();
    }

    public function all()
    {
        return User::all();
    }
}
