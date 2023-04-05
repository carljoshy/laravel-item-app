<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if ($request->user()->hasRoles($roles)) {
            foreach (auth()->user()->roles as $role) {
                if($role->name == 'SuperAdmin' || $role->name == 'Admin' || $role->name == 'Editor' ){
                    return $next($request);
                }


            }

            abort(401, 'This action is unauthorized.');
        }


        // $userRoles = Auth::user()->roles->get('name');
        // if(!$userRoles->contains('Admin')){
        //     return redirect('login');
        // }

        // return $next($request);
    }
}
