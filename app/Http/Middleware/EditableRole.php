<?php

namespace App\Http\Middleware;

use Closure;
use Caffeinated\Shinobi\Models\Role;

class EditableRole
{
    public function handle($request, Closure $next)
    {
        if($request->route('role') && $request->role->exists)
        {
            if($request->role->editable){return $next($request);}
        }
        
        return redirect()->route('roles.index');
    }
}
