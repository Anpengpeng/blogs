<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    protected $timeout = 1200;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('user')) {
            return redirect()->to('site/login');
        }
        if(!Session::has('lastActiveTime')) {
            Session::put('lastActiveTime', time());
        }else{
            $lastActiveTime = Session::get('lastActiveTime');
            if ((time() - $lastActiveTime) > $this->timeout) {
                Session::forget('lastActiveTime');
                Session::forget('user');
                return redirect()->to('site/login');
            }
        }

        return $next($request);
    }
}
