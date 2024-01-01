<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authentificate(Request $request)
    {
        $remember = $request->has('remember');
        $data = $request->only(['email', 'password']);

        if (Auth::attempt($data, $remember)) {
            session()->regenerate();

            if (auth('web')->user()->role_id === 2) {
                return redirect(route('admin'));
            }
            return redirect(route('hotels.index'));
        }

        return back()->withErrors(['email' => 'Не правильный пароль или логин'])->onlyInput('email');
    }

    public function logout()
    {
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        Auth::logout();

        return redirect(route('hotels.index'));
    }
}
