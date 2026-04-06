<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\LoginUserAction;
use App\Actions\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request, RegisterUserAction $action)
    {
        $result = $action->execute($request->validated());

        return response()->json($result);
    }

    public function login(LoginUserRequest $request, LoginUserAction $action)
    {
        $result = $action->execute($request->validated());

        return response()->json($result);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
