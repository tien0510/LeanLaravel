<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home',[
            'title'=>'Trang quản trị',
            'content'=>[
                'sos 1',
                'sos 2',
                'sos 3'
            ]
        ]);
    }
}
