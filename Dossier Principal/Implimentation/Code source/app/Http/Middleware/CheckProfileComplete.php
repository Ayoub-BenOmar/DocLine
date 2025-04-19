<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileComplete
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === 'doctor') {
            // Check if doctor has completed their profile
            $hasProfile = $request->user()->doctor()->exists();
            
            // If profile is complete and trying to access registration form, redirect to dashboard
            if ($hasProfile && $request->route()->getName() === 'doctor-form') {
                return redirect()->route('doctor.dashboard');
            }
            
            // If profile is incomplete and not accessing registration form, redirect to form
            if (!$hasProfile && $request->route()->getName() !== 'doctor-form') {
                return redirect()->route('doctor-form');
            }
        }

        return $next($request);
    }
}