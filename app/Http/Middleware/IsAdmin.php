<?php

namespace App\Http\Middleware;

use Closure;


class IsAdmin
{
    public function handle($request, Closure $next)
    {
              
       $roles = array_slice( func_get_args(),2);
       
       
    
           if(auth()->user()->hasRoles($roles))
           {
               return $next($request);
           }
       
       abort(403, "¡No hay autorización!");       
}
}
