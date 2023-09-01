<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\SessionExpireException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create($portal): View
    {
        // Checks if the route/portal is for parent/guardian or university
        if($portal === 'parent-guardian') {
            session(['portal' => $portal]);
            return view('auth.login')->with([
                'title' => 'PARENT & GUARDIAN LOGIN'
            ]);
        } else if($portal === 'university') {
            session(['portal' => $portal]);
            return view('auth.login')->with([
                'title' => 'UNIVERSITY LOGIN'
            ]);
        }

        return abort(404);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $portal = session('portal');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login', ['portal' => $portal]);
    }
}
