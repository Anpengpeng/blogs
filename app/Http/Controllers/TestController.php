<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function index() {
        return "this is my first action test";
    }

    public function get(Request $request) {
        var_dump(Auth::user());
        var_dump(Auth::id());
//        Session::put('user','1',3);
        $request->session()->forget('userlogin');

        $re = $request->session()->all();
//        $request->session()->flush();
        var_dump($re);
        $a = Session::all();
        var_dump($a);
//        $data = $request->session()->all();
//        var_dump($data);
//        Session::forget('user');
//        var_dump($data);
//        $ret = Session::flush();
//        $ret = Session::forget    ('userlogin_2');

//        print_r($ret);
//        Session::remove('1');
//        Session::remove('2');
//        Session::remove('userlogin_2');

    }

    public function post() {

    }
}
