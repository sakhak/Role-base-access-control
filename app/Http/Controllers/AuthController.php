<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUser;
use App\Actions\User\DeleteUser;
use App\Actions\User\Login;
use Illuminate\Http\Request;
use App\Models\User;
use App\Actions\User\UpdateUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use illuminate\Validation\ValidationException;

class AuthController extends Controller
{
        public function index()
    {
        $users = User::with('userprofiles','roles')->get();
        return response()->json([
            'data'=>$users
        ]);
    }


    public function login(Request $request, Login $loginUser)
    {
        try{
            $data = $loginUser->execute($request->only('email', 'password'));
            return response()->json([
                'data'=> $data
            ]);
        }catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to login',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function register(Request $request, CreateUser $createUser)
    {
            try {
        $token = $createUser->execute($request->all());

        if (!$token) {
            return response()->json([
                'error' => 'No such user'
            ], 404);
        }

        // $cookie = cookie(
        //     'auth_token',
        //     $token,
        //     30 * 24 * 60,
        //     '/',
        //     null,
        //     true,            // secure (set to false if testing over HTTP)
        //     true,            // httpOnly
        //     false,           // raw
        //     // 'Strict'         // SameSite (optional: 'Lax', 'Strict', or 'None')
        // );

        return response()->json([
            'data' => $token
            ], 201); //->cookie($cookie);//->cookie($cookie)

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create user',
                'error' => $e->getMessage()
            ], 500);
}

}
public function update(string $id, Request $request, UpdateUser $updateUser)
{
    $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }
    $currentUser = Auth::user();     if (!$currentUser) {
    return response()->json(['message' => 'No authenticated user found'], 401);
}
    $updated = $updateUser->update($request->all(), $user, $currentUser);
    return response()->json($updated);
}


public function show(string $users)
{
    $user = User::with('userprofiles', 'roles')->find($users);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json(['data' => $user], 200);
}

 public function destroy($id): JsonResponse
{
    $user = User::find(id: $id);

    if (!$user) {
        return response()->json(data: ['message' => 'User not found'], status: 404);
    }

    $user->delete();

    return response()->json(data: ['message' => 'User deleted successfully']);
}


    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();
    //     return response()->json(['message' => 'Successfully logged out']);
    // }


}