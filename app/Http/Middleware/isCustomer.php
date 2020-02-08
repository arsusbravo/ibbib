<?php

namespace App\Http\Middleware;

use Closure;

class isCustomer
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
        if($request->user()->role->slug != 'customer' && $request->user()->role->slug != 'master'){
            return redirect('/')
                ->with('error_msg', __('You do not have access to this page'));
        }
        return $next($request);
    }
}
