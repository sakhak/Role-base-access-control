<?php

namespace App\Actions\User;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteUser
{
    public function delete(User $user, string $id ): JsonResponse
    {
        try {
             $teacher = Teacher::findOrFail($id);
            if ($user->userprofiles && $user->userprofiles->image) {
                Storage::disk('public')->delete($user->userprofiles->image);
            }

            $user->userprofiles()->delete();

            $user->roles()->detach();

            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}