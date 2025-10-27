<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UpdateUser{
public function update(array $data, User $targetUser, User $currentUser)
{
    $validated = Validator::make($data, [
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $targetUser->id,
        'password' => [
            'sometimes',
            'string',
            'min:8',
            'confirmed',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+/',
            'not_regex:/\s/'
        ],
        'phone' => 'sometimes|string|min:8',
        'address' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,gif,png|max:2048',
        'role' => 'sometimes|in:super_admin,admin,teacher,student',
    ])->validate();

    if (!$currentUser->can('update', $targetUser)) {
        return response()->json(['message' => 'Unauthorized User'], 403);
    }

    if (isset($validated['role'])) {
        if ($validated['role'] === 'super_admin' && !$currentUser->hasRole('super_admin')) {
            return response()->json(['message' => 'Only SuperAdmin can assign SuperAdmin role'], 403);
        }

        if (!$currentUser->hasAnyRole(['super_admin', 'admin'])) {
            return response()->json(['message' => 'Only admins can change roles'], 403);
        }

        if ($currentUser->hasRole('admin') && in_array($validated['role'], ['admin', 'super_admin'])) {
            return response()->json(['message' => 'Admins cannot assign admin roles'], 403);
        }
    }

    $updateData = [
        'name' => $validated['name'] ?? $targetUser->name,
        'email' => $validated['email'] ?? $targetUser->email,
    ];

    if (isset($validated['password'])) {
        $updateData['password'] = Hash::make($validated['password']);
    }

    $targetUser->update($updateData);

    $imagePath = $targetUser->userProfile->image ?? null;
    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $imagePath = $data['image']->store('profile', 'public');
    }

    UserProfile::updateOrCreate(
        ['user_id' => $targetUser->id],
        [
            'phone' => $validated['phone'] ?? $targetUser->userProfile->phone ?? null,
            'address' => $validated['address'] ?? $targetUser->userProfile->address ?? null,
            'image' => $imagePath,
        ]
    );

    if (isset($validated['role']) &&
        ($currentUser->hasRole('super_admin') ||
         ($currentUser->hasRole('admin') && !in_array($validated['role'], ['admin', 'super_admin'])))) {
        $role = Role::where('name', $validated['role'])->firstOrFail();
        $targetUser->roles()->sync([$role->id]);
    }

    return $targetUser->load('userProfile', 'roles');
}
}