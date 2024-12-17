<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LoggedInMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:web', only: ['Logout']),
            new Middleware(LoggedInMiddleware::class, except: ['Logout']),
        ];
    }

    public function LoginForm()
    {
        return view('login');
    }

    public function Login(Request $request)
    {
        $params = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if (! auth()->guard('web')->attempt($params)) {
            return back()->withErrors(['error' => 'Username atau password salah.']);
        }

        return redirect()->route('admin.dashboard');
    }

    public function Logout()
    {
        auth()->guard('web')->logout();

        return redirect()->route('login');
    }
}
