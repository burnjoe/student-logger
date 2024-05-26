<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForgetConfirmPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Remove session key when exiting from attendance logger page
        if (url()->previous() === route('attendance-logger') && url()->current() !== route('attendance-logger')) {
            session()->forget('auth.password_confirmed_at');
        }

        return $next($request);
    }
}
