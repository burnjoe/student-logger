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
    public function store(LoginRequest $request, $portal): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect user if user role is valid to selected portal
        if((session('portal') === 'parent-guardian' && (auth()->user()->hasRole('parent') || auth()->user()->hasRole('guardian'))) || (session('portal') === 'university' && !(auth()->user()->hasRole('parent') || auth()->user()->hasRole('guardian')))) {
            $profileable = auth()->user()->profileable;
            return redirect()->intended(RouteServiceProvider::HOME)->with('message', 'Welcome, ' .$profileable->first_name. ' ' .$profileable->last_name. '!');
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login', ['portal' => $portal])
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans('auth.failed')]);
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
