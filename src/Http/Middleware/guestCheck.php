<?php

namespace parsaco\authtestpackage\Http\Middleware;

use Closure;

class guestCheck
{
    public function handle($request,Closure $next){
        if(!(auth()->check())){
            return $next($request);
        }
        abort(403);
    }
}
