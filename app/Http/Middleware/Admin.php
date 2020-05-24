<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        foreach($request->user()->roles as $user){
            if ($user->role == 'admin') {
                return $next($request);
            }
        }

        if ($request->user()) {
            return redirect()->back();
        }
        return redirect()->route('login');
    }
}
