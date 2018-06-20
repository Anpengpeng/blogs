<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function index() {
        return "this is my first action test";
    }

    public function get(Request $request) {
//        $ret = Session::flush();
//        $ret = Session::forget    ('userlogin_2');

//        print_r($ret);
//        Session::remove('1');
//        Session::remove('2');
//        Session::remove('userlogin_2');
        $data = Session::all();
        dd($data);
    }

    public function post() {

    }
}
