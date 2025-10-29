<?php

namespace App\Http\Controllers;

// use App\Models\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        // dd($request->all());
        $validated = Validator::make($request->all() ,[
            'email'     => 'string',
            'password'  => 'string'
        ])->validate();
        
        $user = \App\Models\User::where('email', $validated['email'])->first();
        if(!$user) return back()->withErrors('Unauthenticated');
        $is_correct_pw = Hash::check($validated['password'], $user->password);
        if(!$is_correct_pw)return back()->withErrors('Unauthenticated');
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {    
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $validated = Validator::make($request->all() ,[
            'name'      => 'string',
            'email'     => 'string',
            'password'  => 'string'
        ])->validate();

        $existing_user = User::where('email', $validated['email'])->first();
        if($existing_user) return back()->withErrors('User ready exist.');
        $user = User::create([
            ...$validated, 
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
