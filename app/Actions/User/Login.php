<?php
namespace App\Actions\User;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login
{
    public function execute(array $credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token', ['*'], now()->addDays(30))->plainTextToken;

         $cookie = cookie(
                'auth_token',
                $token,
                30 * 24 * 60,
                '/',
                null,
                true,
                true
            );

        return response()->json([
            'user' => $user->load(['userprofiles','roles']),
            'token' => $token,
            'message'=>'User login succesffully!'
        ],200)->cookie($cookie);
    }
}
