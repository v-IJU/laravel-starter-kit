<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
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

        $routeName = $request->route()->getName();
        // print_r($request->user()->can($routeName));exit;
        if(!$request->user()->can($routeName)) {
            if($request->ajax()) {
                return response('Access denied!', 401);
            }
            $notification = array(
            'message' => 'Access Denied',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
        }

        //check for user force logout
        if($request->user()->force_logout){
            $request->user()->force_logout = 0;
            $request->user()->save();

            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }

}
