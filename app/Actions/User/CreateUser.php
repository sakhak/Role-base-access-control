<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\Role;
// use App\Actions\User\Role;
use App\Models\UserProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class CreateUser
{
    public function execute(array $data): JsonResponse
    {

        $validated = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'not_regex:/\s/'
            ],
            'phone' => 'required|string|min:8',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,gif,png|max:2048',
            'role' => 'required|in:super_admin,admin,teacher,student',
        ])->validate();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $imagePath = null;
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $imagePath = $data['image']->store('profile', 'public');
        }

        UserProfile::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
        ]);

        $role = Role::where('name', $validated['role'])->firstOrFail();
        $user->roles()->attach($role->id);

        return response()->json([
            'data'=>$user->load('userprofiles','roles'),
            'message'=>'User created succesfully!'
        ]);
    }
}
