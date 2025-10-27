<?php

namespace App\Actions\Role\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class UpdateTeacher extends Controller
{
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'department_id' => 'exists:departments,id',
            'hire_date' => 'date'
        ]);

        $teacher->update($validated);
        return response()->json([
            'data'=>$teacher,
            'message'=> 'Teacher user updated successfully!'
        ]);
    }
}