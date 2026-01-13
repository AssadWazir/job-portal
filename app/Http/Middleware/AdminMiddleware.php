<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;


class AdminMiddleware
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
    // 1. Check if the user is logged in AND if they are an admin
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request); // Access granted! Go to the next step.
    }

    // 2. If not an admin, kick them back to the dashboard with an error
    return redirect('/dashboard')->with('error', 'You do not have admin access.');
}
}
