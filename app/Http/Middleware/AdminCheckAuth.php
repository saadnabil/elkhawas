<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('admin')->check()) {
            return redirect()->route('admin.showloginform');
        }

        // Check if the admin user's status is inactive
        if (Auth::guard('admin')->user()->status == 0) {
            // Log out the admin user since their account is inactive
            Auth::guard('admin')->logout();

            // Redirect to the inactive account page with an error message
            return redirect()->route('admin.inactive')
                ->with('error', 'Your account is inactive. Please contact the administrator.');
        }



        return $next($request);
    }
}
