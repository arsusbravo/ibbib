<?php

namespace App\Http\Middleware;

use Closure;

class isCrew
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
        if($request->user()->role->slug != 'crew' && $request->user()->role->slug != 'admin' && $request->user()->role->slug != 'master'){
            return redirect('/')
                ->with('error_msg', __('You do not have access to this page'));
        }
        return $next($request);
    }
}
