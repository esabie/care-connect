<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OtpController extends Controller
{
    // Show the OTP verification page
    public function show()
    {
        //return view('otp'); // Ensure this Blade file exists OR return JSON if using React
        return Inertia::render("Auth/VerifyOTP");
    }

    public function verify(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'otp' => 'required|digits:6',
        ]);

        $user = User::find($request->user_id);

        if (!$user || $user->otp_code != $request->otp) {
            return response()->json(['error' => 'Invalid OTP'], 401);
        }

        // Clear OTP after verification
        $user->update(['otp_code' => null]);

        return response()->json([
            'message' => 'OTP verified successfully',
            'redirect' => route('dashboard'),
        ]);
    }
}
