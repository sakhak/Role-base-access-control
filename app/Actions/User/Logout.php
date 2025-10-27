<?php
namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\Request;

class Logout
{
public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out']);
}
}