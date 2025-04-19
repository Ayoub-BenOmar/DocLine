<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            if ($request->user()) {
                // Redirect to appropriate dashboard based on role
                switch ($request->user()->role) {
                    case 'doctor':
                        return redirect()->route('doctor.dashboard');
                    case 'patient':
                        return redirect()->route('patient.dashboard');
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                }
            }
            return redirect()->route('login');
        }

        return $next($request);
    }
}