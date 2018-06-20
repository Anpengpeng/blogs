<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUserInfo () {
        $res = DB::table('admin')->where([
            ['username', '=', '213'],
            ['password', '=', md5('23we')],
        ])->get();
        dd($res);
        /** @var DB $user */
        $user = DB::table('student')->where('id', 2)->value('name');
        echo $user;
        $user = DB::table('student')->pluck('name');
        foreach ($user as $v) {
            echo $v;
        }
        $user = DB::table('student')->paginate(5);
        dd($user);
        $user = DB::table('student')->get();
        dd($user);
    }
}
