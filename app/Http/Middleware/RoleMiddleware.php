<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(!$request->user()->hasRole($role)) {
            if($request->ajax()) {
                return response('Access denied!', 401);
            }
            $notification = array(
                'message' => 'Access Denied',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        if($permission !== null && !$request->user()->can($permission)) {
            if($request->ajax()) {
                return response('Access denied!', 401);
            }
            abort(401);
        }
        return $next($request);
    }

}
