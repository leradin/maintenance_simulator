<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Lang;

class CheckAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check() || Auth::user()->user != '1'){
            Auth::logout();
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.not_authorized');
            return redirect('/login')->with('message',$message);
        }
        return $next($request);
    }
}
