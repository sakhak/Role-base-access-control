<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function show(string $id)
    {
        $permission = Permission::find($id);
        return view('permissions.update', [
            'permission' => $permission
        ]);
    }
    public function update(string $id, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'key'  => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $permision = Permission::find($id);
        if($permision) $permision->update($validated);
        return redirect()->back()->with('success', 'udpate successfully');
    }
}
