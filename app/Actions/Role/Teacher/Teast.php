<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'department'])->get();
        return response()->json($teachers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'hire_date' => 'required|date'
        ]);

        $teacher = Teacher::create($validated);
        return response()->json($teacher, 201);
    }

    public function show($id)
    {
        $teacher = Teacher::with(['user', 'department'])->findOrFail($id);
        return response()->json($teacher);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'department_id' => 'exists:departments,id',
            'hire_date' => 'date'
        ]);

        $teacher->update($validated);
        return response()->json($teacher);
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getByUserId($userId)
    {
        $teacher = Teacher::with(['user', 'department'])
            ->where('user_id', $userId)
            ->firstOrFail();
            
        return response()->json($teacher);
    }
}