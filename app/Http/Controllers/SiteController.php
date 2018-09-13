<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SiteController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }

    public function auth(Request $request)
    {

        $credentials = $request->only('username', 'password');

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->messages()]);
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return response()->json(['success' => true, 'message' => 'Đăng nhập thành công.']);
        }
        return response()->json(['success' => false, 'message' => 'Đăng nhập không thành công.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
