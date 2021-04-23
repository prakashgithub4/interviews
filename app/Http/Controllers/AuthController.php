<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:25', 'confirmed'],
            'dob' => ['required', 'string']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone_no' => $request->phone_no,
            'gender' => isset($request->gender) ? $request->gender : null,
            'dob' => date('Y-m-d', strtotime($request->dob)),
            'password' => Hash::make($request->password),
        ]);
        return redirect('\register')->with('success', 'User has been successfully registered!');
        // Session::flash('success', 'User has been successfully registered');
    }
}
