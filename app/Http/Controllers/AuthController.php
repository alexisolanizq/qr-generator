<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'     => ['required', 'email'],
                'password'  => ['required'],
            ]);

            $remember = request('keepSigned');

            if (Auth::attempt($credentials, $remember)) {
                $user = request()->user();
                return response()->json(['user' => $user], 200);
            }

            return response()->json(['errors' => ['Usuario y/o contraseña no coinciden']], 401);
        } catch (ValidationException $e) {
            return response()->json($e->validator->errors());
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json('Sesión cerrada correctamente', 200);
    }
}
