<?php
/**
 * User: dingman<app@youxiake.com>
 * Date: 2018/8/31
 * Time: 下午5:12
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{

    public $user;

    public function __construct()
    {
        if (Session::has('user') && !empty(Session::get('user'))) {
           $this->user = Session::get('user');
        }else{
            return redirect('/login/index');
        }
    }
}