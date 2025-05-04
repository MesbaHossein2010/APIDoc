<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $username = '$2y$10$7NunxLyY1qxDko94NkkelOARW1P5HxhrqVEaPWeFvPhUMqze3.r.m';
    private $password = '$2y$10$/1V8B95GDNMBsKiy42A3o.s2wBwh2EYe9tO/yVJ8rzL4Bz.89oymC';

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

//            dd(Hash::make($password), Hash::make($username));

        if (Hash::check($password, $this->password) && Hash::check($username, $this->username)) {
            $request->session()->put('user', $username);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->withErrors(['403' => 'invalid username or password']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('public.docs');
    }
}
