<?php

namespace App\Http\Controllers;

use App\Model\Image;
use App\Model\Order;
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

    public function save(Request $request)
    {
        try {

            $data = $request->only(
                'id',
                'img_type',
                'img_title',
                'img_money',
                'img_content'
            );

            if ($request->hasFile('img_file')) {
                $data['img_file'] = $request->file('img_file');
            }

            $image = new Image();
            $image->save($data);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
        return response()->json(['success' => true, 'message' => 'Thành công.']);
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
