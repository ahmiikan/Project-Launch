<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @param string|null ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($request->user()->hasRole('Admin')) {
                    return redirect()->route('adminDashboard');
                } else if ($request->user()->hasRole('Client')) {
                    return redirect()->route('clientDashboard');
                } else if ($request->user()->hasRole('Freelancer')) {
                    return redirect()->route('freelancerDashboard');
                    return view('404 not found');
                }
            }
        }

        return $next($request);
    }
}
