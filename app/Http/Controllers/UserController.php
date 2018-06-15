<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUserInfo () {
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
        return 'qwe';
    }
}
