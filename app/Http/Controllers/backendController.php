<?php
/**
 * User: dingman<app@youxiake.com>
 * Date: 2018/8/31
 * Time: 下午4:59
 */

namespace App\Http\Controllers;


class backendController extends BaseController
{
    public function index()
    {
//        dump($this->user);
        return view('backend.index');
    }

    public function logout()
    {

    }
}