<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class AdminAuthMiddleware
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
        if(Auth::user() ){
            $role =  Auth::user()->role;
            
            Auth::user()->hasRoles($role);
            // dd($role);
            // UserhasRoles($role);
            if($role->id == User::Admin_Level)
                return $next($request);
        }
        return redirect('/');
        
    }
}
