<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Generate and send OTP
        $otp = $this->generateOtp($user);

        return response()->json([
            'message' => 'User registered successfully. Please verify your email with OTP.',
            'user' => $user,
            'otp' => $otp, // For testing; remove in production
        ], 201);
    }

    // Login API
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        if (!$user->is_verified) {
            return response()->json(['error' => 'Email not verified. Please verify your email.'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    // Forgot Password API
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $user = User::where('email', $request->email)->first();

        // Generate and send OTP
        $otp = $this->generateOtp($user);

        return response()->json([
            'message' => 'OTP sent to your email for password reset.',
            'otp' => $otp, // For testing; remove in production
        ], 200);
    }

    // Send OTP API
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $user = User::where('email', $request->email)->first();

        // Generate and send OTP
        $otp = $this->generateOtp($user);

        return response()->json([
            'message' => 'OTP sent to your email.',
            'otp' => $otp, // For testing; remove in production
        ], 200);
    }

    // Verify OTP API
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $user = User::where('email', $request->email)->first();

        if ($user->otp !== $request->otp) {
            return response()->json(['error' => 'Invalid OTP'], 400);
        }

        if (now()->gt($user->otp_expires_at)) {
            return response()->json(['error' => 'OTP has expired'], 400);
        }

        // Clear OTP and mark as verified
        $user->update([
            'otp' => null,
            'otp_expires_at' => null,
            'is_verified' => true,
        ]);

        return response()->json([
            'message' => 'OTP verified successfully. Account is now active.',
        ], 200);
    }

    // Helper method to generate and send OTP
    private function generateOtp(User $user)
    {
        $otp = rand(100000, 999999); // 6-digit OTP
        $expiresAt = now()->addMinutes(10); // OTP valid for 10 minutes

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => $expiresAt,
        ]);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp. It expires at $expiresAt.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your OTP for Verification');
        });

        return $otp; // Return for testing; remove in production
    }
}
