<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    /**
     * 后台登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login() {
        $title = 'Laravel管理后台登录';
        return view('login.index', ['title' => $title]);
    }

    public function dealLogin(Request $request) {
        if ($request->isMethod('post')) {
            $username = htmlspecialchars($request->get('username'));
            $isexit = DB::table('admin')->where('username',$username)->first();
            if ($isexit) {
                /** @var DB $res */
                $res = DB::table('admin')->where([
                    ['username', '=', $username],
                    ['password', '=', md5($request->get('password'))],
                ])->first();
                Session::put('userlogin','1',1);
                if ($res) {
                    Session::put('loginsuccess','登录成功',3);
                    return redirect('student/index')->with('loginsuccess','登录成功');
                }else{
                    Session::put('loginerror','账号或密码错误',3);
                    return redirect()->back()->with('loginerror', '账号或密码错误');
                }
            }else{
                Session::put('loginerror','您还没有注册，请先注册！',3);
                return redirect()->back()->with('loginerror', '您还没有注册，请先注册');
            }
        }
    }

    public function logout() {

    }
}
