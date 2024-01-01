<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.edit', [
            'user' => auth('web')->user()
        ]);
    }

    public function verification()
    {
        return 'verification.send';
    }

    public function update(Request $request)
    {
        if(auth('web')->user()->email != $request->email) {
            $request->validate([
                'email' => ['unique:users,email'],
            ], [
                'email.unique' => 'Данный email занят'
            ]);
        }
        $user = User::where('id', auth('web')->user()->id)->update([
           'name' => $request->name,
            'email'=> $request->email
        ]);
        return redirect(route('profile'));
    }

    public function passwordUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => ['confirmed'],
            'current_password' => 'required',
            'password_confirmation' => 'required'
        ], [
            'password.confirmed' => 'Повтор пароля не совпадает с новым'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }else {
            if(!Hash::check($request->current_password, auth('web')->user()->password)) {
                return back()->withErrors(['current_password'=>'Не правильный текущий пароль'])->withInput(['current_password']);
            }else {
                $user = User::where('id', auth('web')->user()->id)->update([
                   'password' => Hash::make($request->password)
                ]);
                return redirect()->route('profile')->with('status', 'password-updated');
            }
        }
    }

    public function deleteProfile(Request $request)
    {
        if(!Hash::check($request->password, auth('web')->user()->password)) {
            return back()->withErrors(['password'=>'Не правильный текущий пароль'])->withInput(['current_password']);
        }
        $user = User::find(auth('web')->user()->id);
        $user->delete();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('index'));
    }
}
