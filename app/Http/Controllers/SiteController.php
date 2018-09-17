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
    public function login(Request $request) {
        return view('login.index');
    }

    public function dealLogin(Request $request) {
        $title = 'Laravel管理后台登录';
        if ($request->isMethod('post')) {
            $username = htmlspecialchars($request->get('username'));
            $isexit = DB::table('admin')->where('username',$username)->first();
            if ($isexit) {
                $res = DB::table('admin')->where([
                    ['username', '=', $username],
                    ['password', '=', md5($request->get('password'))],
                ])->first();

                if ($res) {
                    $user = [
                        'id' => $res->id,
                        'username' => $res->username,
                        'nickname' => $res->nickname
                    ];
                    Session::put('user', $user);
                    return redirect('/index');
                }else{
                    return redirect()->back()->with('loginerror', '账号或密码错误');
                }
            }else{
//                Session::put('loginerror','您还没有注册，请先注册！',3);
//                return redirect()->back()->with('loginerror', '您还没有注册，请先注册');
                return view('login.index', ['title' => $title]);
            }
        }else{
            return view("login.index", [ 'url' => '', 'msg' => '非法请求', 'time' => 2 ]);
        }
    }

    public function logout() {

    }
}
