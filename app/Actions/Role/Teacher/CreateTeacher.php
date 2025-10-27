<?php
namespace App\Actions\Role\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CreateTeacher extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'hire_date' => 'required|date'
        ]);

        $teacher = Teacher::create($validated);
        return response()->json([
            'data' =>$teacher,
            'message'=>'Teacher user created successfully!'
        ],201);
    }
}

