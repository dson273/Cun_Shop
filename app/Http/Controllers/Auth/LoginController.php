<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('users.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Kiểm tra loại người dùng và chuyển hướng
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Thông tin xác thực được cung cấp không khớp với hồ sơ của chúng tôi.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }
    public function verify($token)
    {
        $user = User::query()
            ->where('email_verified_at', null)
            ->where('email', base64_decode($token))->first();
        if ($user) {
            $user->update(['email_verified_at' => Carbon::now()]);
            // Auth::login($user);
            return redirect()->intended('/');
        }
    }
}
