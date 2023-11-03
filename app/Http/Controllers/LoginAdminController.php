<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:admins',
            'password' => 'required|min:8'
        ]);

        if (FacadesAuth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            if(auth()->guard('admin')->user()->role == "user"){
                return redirect('/');
            }
            // if(auth(['role'=>'user'])){
            // }
            return redirect()->intended(config('admin.path'));
        }

        return redirect()->back()->withErrors([
            'email' => 'Masukkan Email yang benar!',
            'password' => 'Masukkan Password yang benar!'
        ]);
    }

    public function logout()
    {
        $user = false;
        if(auth()->guard('admin')->user()->role == 'user'){
            $user = !$user;
        }

        FacadesAuth::guard('admin')->logout();
        if($user){
            return redirect('/');
        }
        return redirect()->route('login');
    }
}
