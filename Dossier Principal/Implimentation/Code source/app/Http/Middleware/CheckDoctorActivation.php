<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDoctorActivation
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        
        if ($user && $user->role === 'doctor' && !$user->is_activated) {
            // can access confirmation page and logout only
            if ($request->is('confirmation-page') || $request->is('logout')) {
                return $next($request);
            }
            return redirect()->route('doctor-confirmation');
        }

        return $next($request);
    }
} 