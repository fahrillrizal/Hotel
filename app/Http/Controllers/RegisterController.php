<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
       
       $validatedData = $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:8|max:12',
            'captcha'=>'required|captcha'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); 
        $data = Admin::create($validatedData);

        return redirect()->route('login')->withSuccess('Berhasil Registrasi! Silahkan Login.');
    }
}
