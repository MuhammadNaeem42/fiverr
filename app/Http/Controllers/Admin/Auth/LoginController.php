<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function getLogin()
    {

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            if (!auth('admin')->user()->is_active) {
                Auth::guard('admin')->logout();
                return redirect()->back()->withInput()->with(['error' => __('auth.blocked')]);
            }
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput()->with(['error' => __('auth.failed')]);
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->guest(route('admin.get.login'));


    }
}
