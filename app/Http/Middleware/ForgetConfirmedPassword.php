<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForgetConfirmedPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Illuminate\Support\Facades\Log::channel('single')->info('ForgetConfirmedPassword Middleware');

        // Retain session key when previous route is confirm password
        if (url()->previous() === route('password.confirm')) {
            return $next($request);
        }

        // Remove session key when entering to attendance logger page
        if (url()->previous() !== route('attendance-logger') && url()->current() === route('attendance-logger')) {
            session()->forget('auth.password_confirmed_at');
        }
        
        // Remove session key when exiting from attendance logger page
        if (url()->previous() === route('attendance-logger') && url()->current() !== route('attendance-logger')) {
            session()->forget('auth.password_confirmed_at');
        }
        
        return $next($request);
    }
}
