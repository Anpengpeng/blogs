<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendTo(Request $request)
    {
        $ret = \Mail::send('mail.index', [], function ($message) {
            $message->to(['anpengpeng163@163.com'])->subject('公司未婚妹子数量报表统计');
        });
        Mail::to($request->user())->send();
        dd($ret);
    }
}
