<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect('admin');
        }
        return view('core-ui.login');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            $user = User::where('email', $request->email)->first();
            Session::put('admin_email', $user->email);
            Session::put('admin_name', $user->name);
            Session::put('admin_avatar', $user->name);
            return redirect('admin')->with('account', $request->email);
        } else {
            return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
