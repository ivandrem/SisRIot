<?php

namespace App\Http\Middleware;

use Closure;

class VisibleUser
{
    public function handle($request, Closure $next)
    {
        if($request->route('user') && $request->user->exists && $request->user->visible)
        {
            return $next($request);
        }
        
        return redirect()->route('users.index');
    }
}
