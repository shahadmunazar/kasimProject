<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\OtpMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        return view('frontend.auth.login');
    }

    public function loginWithPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'not_registered',
                'message' => 'No account found with this email address. Please register first.'
            ], 404);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true, 
                'redirect' => session()->pull('url.intended', '/dashboard')
            ]);
        }

        return response()->json([
            'status' => 'invalid_credentials',
            'message' => 'The password you entered is incorrect. Please try again or use Forgot Password.'
        ], 422);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'terms_accepted_at' => now(),
            'terms_accepted_ip' => $request->ip()
        ]);

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        try {
            Mail::to($user->email)->send(new OtpMail($otp));
        } catch (\Exception $e) {
            \Log::error('Failed to send registration OTP email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true, 
            'require_otp' => true, 
            'email' => $user->email,
            'message' => 'Registration successful. A verification OTP has been sent to your email.'
        ]);
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'not_registered',
                'message' => 'This email address is not registered with us. Please register first.'
            ], 404);
        }

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        try {
            Mail::to($user->email)->send(new OtpMail($otp));
        } catch (\Exception $e) {
            \Log::error('Failed to send login OTP email: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to send OTP email. Please verify mail configuration or try again.'
            ], 500);
        }

        return response()->json([
            'success' => true, 
            'message' => 'A 6-digit OTP code has been sent to your email address.'
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'not_registered',
                'message' => 'This email address is not registered with us. Please register first.'
            ], 404);
        }

        if ($user->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP code entered.'], 422);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return response()->json(['message' => 'OTP has expired. Please request a new one.'], 422);
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();
        
        return response()->json(['success' => true, 'redirect' => session()->pull('url.intended', '/dashboard')]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'not_registered',
                'message' => 'No account found with this email address. Please register first.'
            ], 404);
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        $resetUrl = route('frontend.auth.password.reset', [
            'token' => $token,
            'email' => $user->email
        ]);

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($resetUrl, $user->name));
        } catch (\Exception $e) {
            \Log::error('Failed to send password reset email: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to send password reset email. Please try again later.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Password reset link has been sent to your email address.'
        ]);
    }

    public function showResetPassword(Request $request, $token)
    {
        $email = $request->query('email');

        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$record || Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return redirect()->route('frontend.auth.login')
                ->with('error', 'This password reset link is invalid or has expired. Please request a new one.');
        }

        return view('frontend.auth.reset-password', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$record) {
            return response()->json([
                'message' => 'Invalid password reset token or request.'
            ], 422);
        }

        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return response()->json([
                'message' => 'This password reset link has expired. Please request a new one.'
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found.'
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Your password has been reset successfully! You can now sign in.',
            'redirect' => route('frontend.auth.login')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

