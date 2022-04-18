<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function loginuser(Request $request)
    {
        Request()->validate(
            [
                'email' => 'required|email:rfc,dns',
                'password' => 'required|min:8',

            ],
            [
                'email.required' => 'Email atau Katasandi yang anda masukkan salah!!',
                'password.required' => 'Password anda salah!!',
                'password.min' => 'password minimal 8 karakter',
            ]
        );


        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('alert', 'Welcome back');
        } else {
            return redirect('/login');
        }
    }
    public function registeruser(Request $request)
    {
        Request()->validate(
            [
                'name' => 'required|unique:users,name|min:4',
                'email' => 'required|email:rfc,dns|unique:users,email|min:15',
                'password' => 'required|unique:users,password|min:8',

            ],
            [
                'name.required' => 'wajib di isi!!',
                'name.unique' => 'name ini sudah ada',
                'name.min' => 'name min 4 karakter',
                'email.required' => 'wajib di isi!!',
                'email.unique' => 'email ini sudah ada',
                'email.min' => 'email minimal 14 karakter',
                'password.required' => 'wajib di isi!!',
                'password.unique' => 'password ini sudah ada',
                'password.min' => 'password minimal 8 karakter',
            ]
        );

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('alert', 'Anda telah logout');
    }
}
