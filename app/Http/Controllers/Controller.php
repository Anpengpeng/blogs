<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    protected $user;

    public function __construct()
    {
        if (Session::has('user') && !empty(Session::get('user'))) {
            $this->user = Session::get('user');
        }
//        dd(Session::all());
        view()->share([
            'user' => $this->user,
        ]);
    }
}
