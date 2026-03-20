<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $check = $request->all();
        $data = [
            'email' =>$check['email'],
            'password' => $check['password'],
        ];

        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function forget_password()
    {
        return view('admin.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        return view('admin.forget-password');
    }
}
