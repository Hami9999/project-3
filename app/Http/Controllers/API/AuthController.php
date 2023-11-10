<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ForgotPasswordSendRequest;
use App\Mail\PasswordResetEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'forgetPassword','showResetPasswordForm','submitResetPasswordForm']]);
    }

    public function forgetPassword(ForgotPasswordRequest $request)
    {
        try {
            PasswordReset::query()
                ->where('email', $request->email)->delete();
            $token = base64_encode($request->email);
            $passwordReset = new PasswordReset();
            $passwordReset->email = $request->email;
            $passwordReset->token = $token;
            $passwordReset->reset_url = env('APP_FRONT_URL')."/reset-password/$token";
            $success = $passwordReset->save();
            if ($success) {
                $success = !empty(Mail::to($request->email)
                    ->send(new PasswordResetEmail($passwordReset)));
            }
            return response()->json([
                'message' => 'please open your email and click on url ',
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function submitResetPasswordForm(ForgotPasswordSendRequest $request)
    {
        $data = $request->validated();
        $token = base64_decode($data['token']);
        $user =User::where('email',$token)->first();
        $user->password = Hash::make($data['password']);
        $user->save();
        return response()->json([
            'message' => 'your password changed',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
