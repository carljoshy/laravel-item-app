<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isViewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->roles) {
            foreach (auth()->user()->roles as $role) {
                if($role->name == 'Viewer'){
                    return $next($request);
                }
            }
            return redirect()->route('user.login')->with('message', 'Error');
        }

    }
}
