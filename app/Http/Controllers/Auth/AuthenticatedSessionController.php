<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
//        dd(url()->previous());

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

//        return redirect()->intended(route('home', absolute: false));
        if (Auth::user()->admin==1){
            return redirect()->route("admin.home");
        }
        return redirect()->intended("home");
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $previous=url()->previous();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if (str_contains($previous, route('logout'))) {
            $previous = '/';
        }

        return redirect($previous);
    }
}
