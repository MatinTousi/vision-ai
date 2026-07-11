<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{


    public function login()
    {
        return view('login');
    }


    public function register()
    {
        return view('register');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);


        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Alert::error('رمز عبور یا ایمیل اشتباه است!')->showConfirmButton('باشه');
            return redirect()->route('login');
        }


        Auth::login($user);
        $request->session()->regenerate();

        Alert::success('موفقیت آمیز', 'ورود شما با موفقیت انجام شد')->showConfirmButton('باشه');
        return redirect()->route('dashboard');
    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::success('موفقیت آمیز', 'ثبت نام شما با موفقیت ثبت شد')->showConfirmButton('باشه');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success("با موفقیت خارج شدید");
        return view('login');

    }
}
