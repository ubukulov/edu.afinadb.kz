<?php

namespace App\Http\Middleware;

use Closure;

class Course
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
        $course_id = (int) $request->route()->parameter('id');
        if ($request->user()->is_access($course_id)) {
            return $next($request);
        }
        return redirect()->back();
    }
}
