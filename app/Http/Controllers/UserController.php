<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:11',
            'document' => 'required|string|unique:users',
            'birthday' => 'required|string',
            'city' => 'required|string'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        
        $user = User::create($data);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit(Request $request)
    {   
        $user = User::findOrFail($request->userId);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|max:11',
            'birthday' => 'required|string',
            'city' => 'required|string'
        ]);

        $data = $request->only('name', 'phone', 'birthday', 'city');
        
        
        $user = User::findOrFail($request->userId);
        
        $user->fill($data);
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        return redirect()->route('users');
    }

    public function delete(Request $request)
    {   
        $user = User::findOrFail($request->userId);
        $user->delete();
        return redirect()->route('users');
    }
}
