<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(): View
    {
        dd("run");
        // $this->autorize($request->user(), 'profile.create');
        $admin = Role::with('permissions')->where('key', 'admin')->first();
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function create(Request $request){

        $validate = $request->validate([
            'name' => ['required','string'],
            'key' => ['required', 'string'],
            'description' => ['nullable', 'string']

        ]);
        if($validate){
            Role::create($validate);
            return redirect()->back()->with('success','Role created successfully');
        }
    }
    
    public function showcreate(){
        return view('roles.create');
    }
}
