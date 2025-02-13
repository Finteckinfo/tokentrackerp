<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Handle the login request

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required | email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed...
            $user = Auth::user();

            // Return a response with the user info
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 200);
        }

        // Return an error response for failed login
        return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password. Please try again!',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Successfully logged out']);

    }
}
