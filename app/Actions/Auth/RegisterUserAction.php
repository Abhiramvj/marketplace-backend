<?php

namespace App\Actions\Auth;

use App\Enums\UserRole;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public function execute(array $data)
    {
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => UserRole::CUSTOMER,
                'is_active' => true,
            ]);
            $token = $user->createToken('auth-token')->plainTextToken;


            return [
                'user' => $user,
                'token' => $token,
            ];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
