<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
            // if (auth()->user()->role_name) {
            //     foreach (auth()->user()->role_name as $role) {
            //         if($role->name == 'SuperAdmin' || $role->name == 'Admin'){
            //             return $next($request);
            //         }
            //     }
            //     return redirect()->route('user.login')->with('message', 'Error');
            // }

                if ($request->user()->hasRoles($roles)) {
                    foreach (auth()->user()->roles as $role) {
                        if($role->name == 'SuperAdmin'){
                            return $next($request);
                        }
                    }
                    abort(401, 'This action is unauthorized.');
                }

    }
}
