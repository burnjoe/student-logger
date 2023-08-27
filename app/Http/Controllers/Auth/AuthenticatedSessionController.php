<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
        if($portal === 'parent-guardian') {
            return view('auth.login')->with([
                'portal' => 'parent-guardian',
                'title' => 'PARENT & GUARDIAN LOGIN'
            ]);
        } else if($portal === 'university') {
            // FIND A WAY TO ADD MIDDLEWARE FOR IPFILTER
            return view('auth.login')->with([
                'portal' => 'university',
                'title' => 'UNIVERSITY LOGIN'
            ]);
        }

        return abort(404);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, $portal): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        session(['portal' => $portal]);

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
