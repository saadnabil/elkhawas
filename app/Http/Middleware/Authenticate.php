<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    protected function redirectTo(Request $request): ?string
    {
<<<<<<< HEAD
        return $request->expectsJson() ? null : route('admin.login');
=======
        // return $request->expectsJson() ? null : route('user.showloginform');

        if (!$request->expectsJson()) {
            // Get the segments of the URL
            $segments = $request->segments();
            // Check if the URL has at least two segments and the second segment is "dashboard"
            if (count($segments) >= 1 && $segments[0] === 'dashboard') {
                return route('admin.showloginform'); // Redirect to the admin login page
            }elseif(count($segments) >= 1 && $segments[0] === 'user'){
                return route('user.showloginform'); // Redirect to the user login page
            }
        }

        return null; // For other cases, return null to prevent redirection
>>>>>>> 41cf493d05c29fff2c06d5fe828deb317369b467
    }
}
