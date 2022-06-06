<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin/users/login',[
            'title'=>"Đăng Nhập TClothes"
        ]);
//        return view("welcome");
    }
    public function store(Request $request)
    {
//        dd($request->input())
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required',
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
//            'level'     => 1 admin - guest
        ],$request->input('remember'))) {
            return redirect()->route('admin');
        }
        $request->session()->flash('error', 'Email hoặc Password không đúng ');
        return redirect()->back();


    }


}
