<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class MailController extends Controller
{

    /**
     * @OA\Info(title="My First API", version="0.1")
     */

    /**
     * @OA\Get(
     *     path="/api/resource.json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function sendTo(Request $request)
    {
        $message = '23e4';
        $to = 'anpengpeng163@163.com';
        $subject = '公司未婚妹子数量报表统计';

        $ret = Mail::send(
            'emails.test',
            ['content' => $message],
            function ($message) use($to, $subject) {
                $message->to($to)->subject($subject);
            }
        );
        dd($ret);


        $ret = \Mail::send('mail.index', [], function ($message) {
            $message->to(['anpengpeng163@163.com'])->subject('公司未婚妹子数量报表统计');
        });
        Mail::to($request->user())->send();
        dd($ret);
    }


    public function weixin()
    {
        return Socialite::driver('weixinweb')->redirect();
    }
}
