<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Auth;
use Illuminate\Http\Request;

class IsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->is_admin == 0) {
            return $next($request);
        } elseif (Auth::user()->is_admin) {
            return redirect('/spp/admin/dashboard');
        }
        return redirect('/spp/login');

    }
}
