<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckLogIn
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
        if (Auth::guest()) {
            $request->session()->flash('notLogedIn', 'You are not loged in !');
            return back();
        }
        return $next($request);
    }
}
