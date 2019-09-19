<?php
/**
 * Created by PhpStorm.
 * User: app
 * Date: 2019-07-10
 * Time: 18:05
 */

namespace App\Http\Controllers;


use App\Model\Users;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    /**
     * @Swagger
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function doLogin()
    {
        $username = htmlspecialchars(trim(app('request')->input('username')));
        $password = htmlspecialchars(trim(app('request')->input('password')));
        $returnUrl = htmlspecialchars(trim(app('request')->input('url')));

        $ret = Users::where([ 'name' => $username, 'password' => md5($password) ])->first();
        if (!$ret) {
            return response([ 'status' => 500, 'msg' => '登录失败' ]);
        }
//        dd($password,$username,$ret);
        $token = md5($username . $password);
        Cache::put($token, $username, 120);

        $url = 'http://test1.com/api/addCookie?token=' . $token . ',';
        $url .= 'http://test2.com/api/addCookie?token=' . $token . ',';
        $url .= 'http://test3.com/api/addCookie?token=' . $token;

        header('Location: ' . $returnUrl . '?token='.$token.'&url=' . base64_encode($url));
        return response([ 'status' => 200, 'msg' => '登录成功', 'token' => $token ]);
    }

    public function checkToken()
    {
//        $username = htmlspecialchars(trim(app('request')->input('username')));
        $token = htmlspecialchars(trim(app('request')->input('token')));
        if (!empty(Cache::get($token))) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }

    public function logout()
    {
        $username = htmlspecialchars(trim(app('request')->input('username')));
        $token = htmlspecialchars(trim(app('request')->input('token')));
        if (!empty(Cache::get($token)) && Cache::get($token) == $username) {
            Cache::forget($token);
        }

        return true;
    }
}
