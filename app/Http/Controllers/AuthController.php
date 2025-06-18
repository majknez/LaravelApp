<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request) {
        //
        $request->validated();
        // Login the user :)
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }


    public function register() {

        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request) {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
