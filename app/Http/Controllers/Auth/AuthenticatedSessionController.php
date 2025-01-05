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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Authenticate the user
    $request->authenticate();

    // Regenerate the session to prevent session fixation
    $request->session()->regenerate();

    // Redirect based on the user's role
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.adminportal'); // Adjust 'animal.portal' to your actual route
    }

    return redirect()->route('dashboard'); // Adjust 'dashboard' to your actual route
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
