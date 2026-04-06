<?php

namespace App\Actions\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public function execute(array $data)
    {
       try {
         $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)) {
            throw new Exception('Invalid credentials');
        }

        if (!$user->is_active) {
            throw new Exception('User is not active');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
       } catch (Exception $e) {
        throw new Exception($e->getMessage());
       }
    }
}
