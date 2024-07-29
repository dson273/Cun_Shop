<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(){
        //View trang đăng ký
        return view('users.auth.register');
    }

    public function register(Request $request){
        //Xử lý logic đăng ký
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string','unique:users', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        //Tạo user mới
        $user = User::query()->create($data);
        //Gửi email verify
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));
        //Login với user vừa tạo
        Auth::login($user);
        // gen lại token cho user vừa đăng nhập
        $request->session()->regenerate();

        //quay lại trang phía trước
        return redirect()->intended('/');
    }
}
