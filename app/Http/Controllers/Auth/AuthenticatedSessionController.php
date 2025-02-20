<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\SendOTP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Store OTP verification session
            session(['otp_verified' => false, 'otp_user_id' => $user->id]);

            // Generate and save OTP
            $otpCode = rand(100000, 999999);
            $user->update(['otp_code' => $otpCode]);

            // Send OTP via email
            Mail::to($user->email)->send(new SendOTP($otpCode));

            //dd($otpCode);

            // Redirect to OTP verification page
            // return redirect()->intended('/verify-otp');
            // return Inertia::render('Auth/VerifyOTP');
        }

        // $request->authenticate();

        // $request->session()->regenerate();

        return redirect()->intended("/verify-otp");
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
