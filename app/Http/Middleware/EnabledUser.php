<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Http\Controllers\Auth\LoginControllers;
use Illuminate\Http\Request;

class EnabledUser
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->enabled)
        {
            return $next($request);
        }
        
        return redirect('login')->with(Auth::logout());
    }
}
